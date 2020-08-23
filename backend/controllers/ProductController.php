<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Request;
use backend\models\Product;
use common\models\ProductDetail;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $search = Yii::$app->request->queryParams;
    	$model = new Product();
        $dataProvider = $model->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['Product']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['Product']['pageSize'];
        	}
        	return $this->renderPartial('index', [
        		'model' => $model,
            	'dataProvider' => $dataProvider,
            	'search' => $search
        	]);
        }else{
        	return $this->render('index', [
        		'model' => $model,
            	'dataProvider' => $dataProvider,
            	'search' => $search
        	]);

        }
    }
    public function actionCreate()
    {
    	$Product = new Product();
    	$ProductDetail = new ProductDetail();

    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){

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

            	// product
            	$Product->product_name_th = Yii::$app->request->post()['Product']['product_name_th'];
            	$Product->product_name_en = Yii::$app->request->post()['Product']['product_name_en'];
            	$Product->product_icon = UploadedFile::getInstance($Product, 'product_icon');
            	if(!empty($Product->product_icon)){
				$product_icon_file  = $Product->product_icon->baseName.'_'.time().'.'.$Product->product_icon->extension;
				$product_icon_Path  = $folder_upload."/".$path_folder."/".$product_icon_file;
				$Product->product_icon->saveAs($product_icon_Path);
				$Product->product_icon = $product_icon_file;
				$Product->product_icon_path = $path_folder;
				}
				$Product->is_active = Yii::$app->request->post()['Product']['is_active'];
				$Product->created_user = 1;
				$Product->created_date = date("Y-m-d H:i:s");
				$Product->modified_user = 1;
				$Product->modified_date = date("Y-m-d H:i:s");
				$Product->save();

				// product detail
				$ProductDetail->product_id = Yii::$app->db->getLastInsertID();
				$ProductDetail->product_detail_content_th = Yii::$app->request->post()['ProductDetail']['product_detail_content_th'];
            	$ProductDetail->product_detail_content_en = Yii::$app->request->post()['ProductDetail']['product_detail_content_en'];
				$ProductDetail->product_detail_image = UploadedFile::getInstance($ProductDetail, 'product_detail_image');
				if(!empty($ProductDetail->product_detail_image)){
				$product_detail_image_file  = $ProductDetail->product_detail_image->baseName.'_'.time().'.'.$ProductDetail->product_detail_image->extension;
				$product_detail_image_Path  = $folder_upload."/".$path_folder."/".$product_detail_image_file;
				$ProductDetail->product_detail_image->saveAs($product_detail_image_Path);
				$ProductDetail->product_detail_image = $product_detail_image_file;
				$ProductDetail->product_detail_image_path = $path_folder;
				}
				$ProductDetail->save();
            }
        }
        return $this->renderAjax('create', [
			'Product' => $Product,
			'ProductDetail' => $ProductDetail,
		]);
    }

    public function actionUpdate()
    {
    	$product_id = Yii::$app->request->get('id');

    	$Product = Product::findOne(['product_id' => $product_id]);
    	$ProductDetail = ProductDetail::findOne(['product_id' => $product_id]);


    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){

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

            	// product
            	$Product->product_name_th = Yii::$app->request->post()['Product']['product_name_th'];
            	$Product->product_name_en = Yii::$app->request->post()['Product']['product_name_en'];
            	$Product->product_icon = UploadedFile::getInstance($Product, 'product_icon');

            	if(!empty($Product->product_icon)){
				$product_icon_file  = $Product->product_icon->baseName.'_'.time().'.'.$Product->product_icon->extension;
				$product_icon_Path  = $folder_upload."/".$path_folder."/".$product_icon_file;
				$Product->product_icon->saveAs($product_icon_Path);
				$Product->product_icon = $product_icon_file;
				$Product->product_icon_path = $path_folder;
				}else{
				$Product->product_icon = $Product->getOldAttribute('product_icon');
				$Product->product_icon_path = $Product->getOldAttribute('product_icon_path');
				}
				$Product->is_active = Yii::$app->request->post()['Product']['is_active'];
				$Product->modified_user = 1;
				$Product->modified_date = date("Y-m-d H:i:s");
				$Product->save();

				// product detail
				$ProductDetail->product_detail_content_th = Yii::$app->request->post()['ProductDetail']['product_detail_content_th'];
            	$ProductDetail->product_detail_content_en = Yii::$app->request->post()['ProductDetail']['product_detail_content_en'];
            	$ProductDetail->product_detail_image = UploadedFile::getInstance($ProductDetail, 'product_detail_image');

            	if(!empty($ProductDetail->product_detail_image)){
				$product_detail_image_file  = $ProductDetail->product_detail_image->baseName.'_'.time().'.'.$ProductDetail->product_detail_image->extension;
				$product_detail_image_Path  = $folder_upload."/".$path_folder."/".$product_detail_image_file;
				$ProductDetail->product_detail_image->saveAs($product_detail_image_Path);
				$ProductDetail->product_detail_image = $product_detail_image_file;
				$ProductDetail->product_detail_image_path = $path_folder;
				}else{
				$ProductDetail->product_detail_image = $ProductDetail->getOldAttribute('product_detail_image');
				$ProductDetail->product_detail_image_path = $ProductDetail->getOldAttribute('product_detail_image_path');
				}
				$ProductDetail->save();
            }
        }
    	return $this->renderAjax('update', [
			'Product' => $Product,
			'ProductDetail' => $ProductDetail,
		]);
    }

    public function actionDelete()
    {
    	$product_id = Yii::$app->request->get('id');

    	$ProductDetail = ProductDetail::find()
		->where(['product_id'=>$product_id])
		->one()
		->delete();

    	$Product = Product::find()
		->where(['product_id'=>$product_id])
		->one()
		->delete();

		$model = new Product();
		$search = Yii::$app->request->queryParams;
        $dataProvider = $model->search($search);
		return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'search' => $search
        ]);
    }
}
