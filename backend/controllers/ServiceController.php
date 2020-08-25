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
            	$save = $this->save($Service,$ServiceDetail,null);
            }
        }
        return $this->renderAjax('create', [
			'Service' => $Service,
			'ServiceDetail' => $ServiceDetail,
		]);
    }

    public function actionUpdate()
    {
    	$id = Yii::$app->request->get('id');
    	$Service = Service::findOne(['service_id' => $id]);
    	$ServiceDetail = ServiceDetail::findOne(['service_id' => $id]);
    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
            	$save = $this->save($Service,$ServiceDetail,$id);
            }
        }
    	return $this->renderAjax('update', [
			'Service' => $Service,
			'ServiceDetail' => $ServiceDetail,
		]);
    }

    public function actionDelete()
    {
    	$id = Yii::$app->request->get('id');
    	$ServiceDetail = ServiceDetail::find()
		->where(['service_id'=>$id])
		->one()
		->delete();

    	$Service = Service::find()
		->where(['service_id'=>$id])
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

    public function saveBanner($model,$id)
    {
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

        $model->banner_image_th = UploadedFile::getInstance($model, 'banner_image_th');
    }
    public function save($model,$model2=null,$id=null)
    {

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
        $model->service_name_th = Yii::$app->request->post()['Service']['service_name_th'];
        $model->service_name_en = Yii::$app->request->post()['Service']['service_name_en'];
        $model->service_content_th = Yii::$app->request->post()['Service']['service_content_th'];
        $model->service_content_en = Yii::$app->request->post()['Service']['service_content_en'];
        $model->service_image = UploadedFile::getInstance($model, 'service_image');

        if(!empty($model->service_image)){
        $service_image_file  = $model->service_image->baseName.'_'.time().'.'.$model->service_image->extension;
        $service_image_path  = $folder_upload."/".$path_folder."/".$service_image_file;
        $model->service_image->saveAs($service_image_path);
        $model->service_image = $service_image_file;
        $model->service_image_path = $path_folder;
        }else{
        $model->service_image = $model->getOldAttribute('service_image');
        $model->service_image_path = $model->getOldAttribute('service_image_path');
        }
        $model->is_active = Yii::$app->request->post()['Service']['is_active'];

        $model->save();

        // Service detail
        $model2->service_detail_content_th = Yii::$app->request->post()['ServiceDetail']['service_detail_content_th'];
        $model2->service_detail_content_en = Yii::$app->request->post()['ServiceDetail']['service_detail_content_en'];
        $model2->save();

        return true;
    }
}
