<?php

namespace frontend\controllers;
use frontend\models\Quotation;
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
    
}
