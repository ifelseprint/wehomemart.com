<?php

namespace frontend\controllers;
use frontend\models\Quotation;
use frontend\models\QuotationProductMapping;
use kartik\mpdf\Pdf;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class QuotationController extends \yii\web\Controller
{
    public function actionIndex($id)
    {

        $Quotation = new Quotation();

        $session = Yii::$app->session;

        if (!empty($session['users'])){
        $Quotation->quotation_firstname = $session['users']->user_firstname;
        $Quotation->quotation_lastname = $session['users']->user_lastname;
        $Quotation->quotation_email = $session['users']->user_email;
        $Quotation->quotation_telephone = $session['users']->user_telephone;
        $Quotation->quotation_company = $session['users']->user_company;
        $Quotation->quotation_tax_id = $session['users']->user_tax_id;
        $Quotation->quotation_address = $session['users']->user_address;
        $Quotation->quotation_building = $session['users']->user_building;
        $Quotation->quotation_moo = $session['users']->user_moo;
        $Quotation->quotation_district = $session['users']->user_district;
        $Quotation->quotation_amphur = $session['users']->user_amphur;
        $Quotation->quotation_province = $session['users']->user_province;
        $Quotation->quotation_postal_code = $session['users']->user_postal_code;
        }

        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if ($Quotation->load($post)){

                $parameter = \common\models\Parameter::find()
                ->where(['parameter_name' => 'quotation'])
                ->andWhere(['parameter_action' => date('Y')])
                ->one();

                if(!empty($parameter)){
                    $parameter->parameter_count += 1;
                    $parameter->save();
                }else{
                    $parameter = new \common\models\Parameter();
                    $parameter->parameter_name = 'quotation';
                    $parameter->parameter_action = date('Y');
                    $parameter->parameter_count = 1;
                    $parameter->save();
                }

                $folder_upload = Yii::getAlias('@frontend').'/web/uploads';
                $year = date("Y");
                $month = date("m");

                $folder = $folder_upload."/".$year;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                $folder = $folder_upload."/".$year."/".$month;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                $path_folder = $year."/".$month;

                $Quotation->quotation_product_image = UploadedFile::getInstance($Quotation, 'quotation_product_image');
                $quotation_product_image  = 'quotation_'.time().'.'.$Quotation->quotation_product_image->extension;
                $quotation_product_image_path  = $folder_upload."/".$path_folder."/".$quotation_product_image;
                $Quotation->quotation_product_image->saveAs($quotation_product_image_path);
                $Quotation->quotation_product_image = $quotation_product_image;
                $Quotation->quotation_product_image_path = $path_folder;

                $Quotation->quotation_code = 'WH'.date('Y').sprintf('%05d',$parameter->parameter_count);
                $Quotation->created_date = new \yii\db\Expression('NOW()');
                $Quotation->modified_date = new \yii\db\Expression('NOW()');

                if ($Quotation->save()) {

                    foreach ($post['Quotation']['quotation_product'] as $key => $data) {
                        $QuotationProductMapping = new \common\models\QuotationProductMapping();
                        $QuotationProductMapping->quotation_id = $Quotation->quotation_id;
                        $QuotationProductMapping->product_id = $data;
                        $QuotationProductMapping->save();
                    }

                    $generatePDF = $this->generatePDF($Quotation->quotation_id);
                    $sendmail = $this->sendmail($Quotation->quotation_id,$Quotation,$generatePDF);
                    unlink($generatePDF);

                    return json_encode([
                        "status" => true,
                        "response" => Yii::t('app', 'response_quotation_success',['quotation_code' => $Quotation->quotation_code])
                    ]);

                }else{
                    return json_encode([
                        "status" => false,
                        "response" => $Quotation->getErrors()
                    ]);
                }
            }
        }

        $project_category_name = 'project_category_name_'.Yii::$app->language;
        $product_name = 'product_name_'.Yii::$app->language;

        return $this->renderAjax('index', [
            'Quotation' => $Quotation,
            'dataProjectCategory' => ArrayHelper::map(\common\models\ProjectCategory::find()
                ->where(['is_active' => '1'])
                ->orderBy([$project_category_name => SORT_ASC])
                ->all(), 'project_category_id', $project_category_name),
            'dataProduct' => ArrayHelper::map(\common\models\Product::find()
                ->where(['is_active' => '1'])
                ->orderBy(['product_id' => SORT_ASC])
                ->all(), 'product_id', $product_name),
            'id' => $id
        ]);
    }

    public function generatePDF($quotation_id)
    {
        $Quotation = Quotation::find()
        ->where(['quotation_id'=> $quotation_id])
        ->one();

        $ProjectCategory = \common\models\ProjectCategory::find()
        ->where(['project_category_id'=> $Quotation->quotation_project_category_id])
        ->one();

        $QuotationProductMapping = QuotationProductMapping::find()
        ->where(['quotation_id'=> $quotation_id])
        ->all();

        $SetTitle = "Quotation";
        $content = $this->renderPartial("quotation_pdf",[
            'Quotation' => $Quotation,
            'ProjectCategory' => $ProjectCategory,
            'QuotationProductMapping' => $QuotationProductMapping,

        ]);
        $pdf = new Yii::$app->pdf;
        $pdf->mode = Pdf::MODE_UTF8;
        $pdf->destination = Pdf::DEST_FILE;
        $pdf->filename = Yii::getAlias('@frontend').'/web/uploads/quotation_'.$Quotation->quotation_code.'.pdf';
        $pdf->content = $content;
        $pdf->methods = ['SetTitle' => $SetTitle];
        $pdf->cssInline = '
        *,body{font-family:Garuda;font-size:12px}
        .field_required{color:#f00;}
        @media all{
            .table, .table tr{ border: 1px solid black;}.page-break {display: none;}
        }
        @media print{
            .page-break{display: block; page-break-before: always;}
        }';
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type','application/pdf');
        $pdf->render();
        return $pdf->filename;
    }
    public function sendmail($quotation_id,$quotation=null,$generatePDF=null)
    {

        $mail = Yii::$app->mailer->compose('layouts/quotation',[
            'quotation'    => $quotation,
        ]);
        $mail->setFrom('noreply.wehomemart@gmail.com');
        $mail->setTo('dekcomgigkok@gmail.com');
        $mail->setSubject('Request quotation from wehomemart.com');

        if(!empty($generatePDF)){
        $mail->attach($generatePDF);
        }

        $mail->send();
        return $mail;
    }
}
