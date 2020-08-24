<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Request;
use backend\models\Service;
use common\models\ServiceDetail;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
class ServiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $search = Yii::$app->request->queryParams;
    	$model = new Service();
        $dataProvider = $model->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['Service']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['Service']['pageSize'];
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
    	$Service = new Service();
    	$ServiceDetail = new ServiceDetail();

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

            	// Service
            	$Service->service_name_th = Yii::$app->request->post()['Service']['service_name_th'];
            	$Service->service_name_en = Yii::$app->request->post()['Service']['service_name_en'];
            	$Service->service_content_th = Yii::$app->request->post()['Service']['service_content_th'];
            	$Service->service_content_en = Yii::$app->request->post()['Service']['service_content_en'];
            	$Service->service_image = UploadedFile::getInstance($Service, 'service_image');
            	if(!empty($Service->service_image)){
				$service_image_file  = $Service->service_image->baseName.'_'.time().'.'.$Service->service_image->extension;
				$service_image_path  = $folder_upload."/".$path_folder."/".$service_image_file;
				$Service->service_image->saveAs($service_image_path);
				$Service->service_image = $service_image_file;
				$Service->service_image_path = $path_folder;
				}
				$Service->is_active = Yii::$app->request->post()['Service']['is_active'];
				$Service->created_user = 1;
				$Service->created_date = date("Y-m-d H:i:s");
				$Service->modified_user = 1;
				$Service->modified_date = date("Y-m-d H:i:s");
				$Service->save();

				// Service Detail
				$ServiceDetail->service_id = Yii::$app->db->getLastInsertID();
				$ServiceDetail->service_detail_content_th = Yii::$app->request->post()['ServiceDetail']['service_detail_content_th'];
            	$ServiceDetail->service_detail_content_en = Yii::$app->request->post()['ServiceDetail']['service_detail_content_en'];
				$ServiceDetail->save();
            }
        }
        return $this->renderAjax('create', [
			'Service' => $Service,
			'ServiceDetail' => $ServiceDetail,
		]);
    }

    public function actionUpdate()
    {
    	$service_id = Yii::$app->request->get('id');

    	$Service = Service::findOne(['service_id' => $service_id]);
    	$ServiceDetail = ServiceDetail::findOne(['service_id' => $service_id]);


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

            	// Service
            	$Service->service_name_th = Yii::$app->request->post()['Service']['service_name_th'];
            	$Service->service_name_en = Yii::$app->request->post()['Service']['service_name_en'];
            	$Service->service_content_th = Yii::$app->request->post()['Service']['service_content_th'];
            	$Service->service_content_en = Yii::$app->request->post()['Service']['service_content_en'];
            	$Service->service_image = UploadedFile::getInstance($Service, 'service_image');

            	if(!empty($Service->service_image)){
				$service_image_file  = $Service->service_image->baseName.'_'.time().'.'.$Service->service_image->extension;
				$service_image_path  = $folder_upload."/".$path_folder."/".$service_image_file;
				$Service->service_image->saveAs($service_image_path);
				$Service->service_image = $service_image_file;
				$Service->service_image_path = $path_folder;
				}else{
				$Service->service_image = $Service->getOldAttribute('service_image');
				$Service->service_image_path = $Service->getOldAttribute('service_image_path');
				}
				$Service->is_active = Yii::$app->request->post()['Service']['is_active'];
				$Service->modified_user = 1;
				$Service->modified_date = date("Y-m-d H:i:s");
				$Service->save();

				// Service detail
				$ServiceDetail->service_detail_content_th = Yii::$app->request->post()['ServiceDetail']['service_detail_content_th'];
            	$ServiceDetail->service_detail_content_en = Yii::$app->request->post()['ServiceDetail']['service_detail_content_en'];
				$ServiceDetail->save();
            }
        }
    	return $this->renderAjax('update', [
			'Service' => $Service,
			'ServiceDetail' => $ServiceDetail,
		]);
    }

    public function actionDelete()
    {
    	$service_id = Yii::$app->request->get('id');

    	$ServiceDetail = ServiceDetail::find()
		->where(['service_id'=>$service_id])
		->one()
		->delete();

    	$Service = Service::find()
		->where(['service_id'=>$service_id])
		->one()
		->delete();

		$model = new Service();
		$search = Yii::$app->request->queryParams;
        $dataProvider = $model->search($search);
		return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'search' => $search
        ]);
    }
}
