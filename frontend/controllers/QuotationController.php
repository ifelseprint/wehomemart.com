<?php

namespace frontend\controllers;
use common\models\QuotationProductImageMapping;
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

        set_time_limit(0);
        $Quotation = new Quotation();

        $session = Yii::$app->session;
        $post = Yii::$app->request->post();

        if (!empty($session['users'])){
        $Quotation->quotation_firstname = $session['users']->user_firstname;
        $Quotation->quotation_lastname = $session['users']->user_lastname;
        $Quotation->quotation_email = $session['users']->user_email;
        $Quotation->quotation_telephone = $session['users']->user_telephone;
        $Quotation->quotation_company = $session['users']->user_company;
        $Quotation->quotation_tax_id = $session['users']->tax_id;
        $Quotation->quotation_address = $session['users']->user_address;
        $Quotation->quotation_building = $session['users']->user_building;
        $Quotation->quotation_moo = $session['users']->user_moo;
        $Quotation->quotation_district = $session['users']->user_district;
        $Quotation->quotation_amphur = $session['users']->user_amphur;
        $Quotation->quotation_province = $session['users']->user_province;
        $Quotation->quotation_postal_code = $session['users']->user_postal_code;

        $Quotation->quotation_delivery_tax_address = $session['users']->tax_address;
        $Quotation->quotation_delivery_tax_building = $session['users']->tax_building;
        $Quotation->quotation_delivery_tax_moo = $session['users']->tax_moo;
        $Quotation->quotation_delivery_tax_district = $session['users']->tax_district;
        $Quotation->quotation_delivery_tax_amphur = $session['users']->tax_amphur;
        $Quotation->quotation_delivery_tax_province = $session['users']->tax_province;
        $Quotation->quotation_delivery_tax_postal_code = $session['users']->tax_postal_code;

        }


        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();

            $Quotation->quotation_delivery_type = $post['quotation_delivery_type'];

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

                $Quotation->quotation_product_file = UploadedFile::getInstance($Quotation, 'quotation_product_file');
                if(!empty($Quotation->quotation_product_file)){
                    $quotation_product_file  = 'quotation_file_'.time().'.'.$Quotation->quotation_product_file->extension;
                    $quotation_product_file_path  = $folder_upload."/".$path_folder."/".$quotation_product_file;
                    $Quotation->quotation_product_file->saveAs($quotation_product_file_path);
                    $Quotation->quotation_product_file = $quotation_product_file;
                    $Quotation->quotation_product_file_path = $path_folder;
                }

                $product_image_num = 1;
                foreach ($Quotation->quotation_product_name as $key => $product_name) {

                    $product_image_name = 'quotation_product_image_'.$key;
                    $Quotation->$product_image_name = UploadedFile::getInstance($Quotation, 'quotation_product_image_'.$key);

                    if(!empty($product_name)){

                        if(!empty($Quotation->$product_image_name)){

                            $quotation_product_image  = 'quotation_product_'.$product_image_num.'_'.time().'.'.$Quotation->$product_image_name->extension;
                            $quotation_product_image_path  = $folder_upload."/".$path_folder."/".$quotation_product_image;
                            $Quotation->$product_image_name->saveAs($quotation_product_image_path);
                            $Quotation->$product_image_name = $quotation_product_image;

                            $QuotationProductImage[$key]['quotation_product_name'] = $Quotation->quotation_product_name[$key];
                            $QuotationProductImage[$key]['quotation_product_image'] = $quotation_product_image;
                            $QuotationProductImage[$key]['quotation_product_image_path'] = $path_folder;
                            $QuotationProductImage[$key]['quotation_product_unit'] = $Quotation->quotation_product_unit[$key];
                            $QuotationProductImage[$key]['quotation_product_amount'] = $Quotation->quotation_product_amount[$key];
                            $product_image_num++;
                        }
                    }
                }

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

                    if(!empty($QuotationProductImage)){
                        foreach ($QuotationProductImage as $key => $ProductImage) {

                            if(!empty($ProductImage)){
                                $QuotationProductImageMapping = new \common\models\QuotationProductImageMapping();
                                $QuotationProductImageMapping->quotation_id = $Quotation->quotation_id;
                                $QuotationProductImageMapping->quotation_product_name = $ProductImage['quotation_product_name'];
                                $QuotationProductImageMapping->quotation_product_image = $ProductImage['quotation_product_image'];
                                $QuotationProductImageMapping->quotation_product_image_path = $ProductImage['quotation_product_image_path'];
                                $QuotationProductImageMapping->quotation_product_unit = $ProductImage['quotation_product_unit'];
                                $QuotationProductImageMapping->quotation_product_amount = $ProductImage['quotation_product_amount'];
                                $QuotationProductImageMapping->save();
                            }
                        }
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
        $provinces_name = "name_".Yii::$app->language;
        $amphure_name = "name_".Yii::$app->language;
        $districts_name = "name_".Yii::$app->language;
        if (!empty($session['users'])){
            return $this->renderAjax('index', [
                'Quotation' => $Quotation,
                'dataProvinces' => ArrayHelper::map(\common\models\Provinces::find()
                    ->orderBy([$provinces_name => SORT_ASC])
                    ->all(), 'id', $provinces_name),
                'dataAmphures' => ArrayHelper::map(\common\models\Amphures::find()
                    ->where(['province_id' => $session['users']->user_province])
                    ->orderBy([$amphure_name => SORT_ASC])
                    ->all(), 'id', $amphure_name),
                'dataDistricts' => ArrayHelper::map(\common\models\Districts::find()
                    ->where(['amphure_id' => $session['users']->user_amphur])
                    ->orderBy([$districts_name => SORT_ASC])
                    ->all(), 'id', $districts_name),
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

        }else{
            return $this->renderAjax('index', [
                'Quotation' => $Quotation,
                'dataProvinces' => ArrayHelper::map(\common\models\Provinces::find()
                    ->orderBy([$provinces_name => SORT_ASC])
                    ->all(), 'id', $provinces_name),
                'dataAmphures' => [],
                'dataDistricts' => [],
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
    }

    public function generatePDF($quotation_id)
    {
        $Quotation = Quotation::find()
        ->where(['quotation_id'=> $quotation_id])
        ->one();

        $Quotation->quotation_district = $this->convert('\common\models\Districts',$Quotation->quotation_district);
        $Quotation->quotation_amphur = $this->convert('\common\models\Amphures',$Quotation->quotation_amphur);
        $Quotation->quotation_province = $this->convert('\common\models\Provinces',$Quotation->quotation_province);

        $Quotation->quotation_delivery_tax_district = $this->convert('\common\models\Districts',$Quotation->quotation_delivery_tax_district);
        $Quotation->quotation_delivery_tax_amphur = $this->convert('\common\models\Amphures',$Quotation->quotation_delivery_tax_amphur);
        $Quotation->quotation_delivery_tax_province = $this->convert('\common\models\Provinces',$Quotation->quotation_delivery_tax_province);

        $Quotation->quotation_delivery_other_district = $this->convert('\common\models\Districts',$Quotation->quotation_delivery_other_district);
        $Quotation->quotation_delivery_other_amphur = $this->convert('\common\models\Amphures',$Quotation->quotation_delivery_other_amphur);
        $Quotation->quotation_delivery_other_province = $this->convert('\common\models\Provinces',$Quotation->quotation_delivery_other_province);

        $ProjectCategory = \common\models\ProjectCategory::find()
        ->where(['project_category_id'=> $Quotation->quotation_project_category_id])
        ->one();

        $QuotationProductMapping = QuotationProductMapping::find()
        ->where(['quotation_id'=> $quotation_id])
        ->all();

        $QuotationProductImageMapping = QuotationProductImageMapping::find()
        ->where(['quotation_id'=> $quotation_id])
        ->all();

        $SetTitle = "Quotation";
        $content = $this->renderPartial("quotation_pdf",[
            'Quotation' => $Quotation,
            'ProjectCategory' => $ProjectCategory,
            'QuotationProductMapping' => $QuotationProductMapping,
            'QuotationProductImageMapping' => $QuotationProductImageMapping

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
        // $mail->setTo('sales@sch.co.th');
        $mail->setTo('dekcomgigkok@gmail.com');
        $mail->setSubject('Request quotation from wehomemart.com');

        if(!empty($generatePDF)){
        $mail->attach($generatePDF);
        }

        $mail->send();
        return $mail;
    }

    public function actionTax($id){

        $session = Yii::$app->session;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $session['users']
        ];
        exit;
    }
    
    public function actionAmphurList($id)
    {
        $amphures_name = "name_".Yii::$app->language;
        $models = \common\models\Amphures::find()
        ->where(['province_id'=> $id])
        ->orderBy(['name_th' => SORT_ASC])
        ->asArray()
        ->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $models
        ];
    }

    public function actionDistrictList($id)
    {
        $amphures_name = "name_".Yii::$app->language;
        $models = \common\models\Districts::find()
        ->where(['amphure_id'=> $id])
        ->andWhere(['!=','zip_code', 0])
        ->orderBy(['name_th' => SORT_ASC])
        ->asArray()
        ->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $models
        ];
    }

    public function actionZipcodeList($id)
    {
        $amphures_name = "name_".Yii::$app->language;
        $models = \common\models\Districts::find()
        ->where(['id'=> $id,])
        ->andWhere(['!=','zip_code', 0])
        ->orderBy(['zip_code' => SORT_ASC])
        ->asArray()
        ->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $models
        ];
    }

    public function convert($model,$id)
    {
        $name = "name_".Yii::$app->language;
        $models = $model::find()
        ->where(['id'=> $id])
        ->asArray()
        ->one();

        return $models[$name];
    }
}
