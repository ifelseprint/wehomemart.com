<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Jobs;
use yii\helpers\Url;
class JobsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $search = Yii::$app->request->queryParams;
    	$model = new Jobs();
        $dataProvider = $model->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['Jobs']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['Jobs']['pageSize'];
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
    	$Jobs = new Jobs();

    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){

            	// Jobs
            	$Jobs->jobs_name_th = Yii::$app->request->post()['Jobs']['jobs_name_th'];
            	$Jobs->jobs_name_en = Yii::$app->request->post()['Jobs']['jobs_name_en'];
            	$Jobs->jobs_content_th = Yii::$app->request->post()['Jobs']['jobs_content_th'];
            	$Jobs->jobs_content_en = Yii::$app->request->post()['Jobs']['jobs_content_en'];
				$Jobs->is_active = Yii::$app->request->post()['Jobs']['is_active'];
				$Jobs->created_user = 1;
				$Jobs->created_date = date("Y-m-d H:i:s");
				$Jobs->modified_user = 1;
				$Jobs->modified_date = date("Y-m-d H:i:s");
				$Jobs->save();
            }
        }
        return $this->renderAjax('create', [
			'Jobs' => $Jobs
		]);
    }

    public function actionUpdate()
    {
    	$jobs_id = Yii::$app->request->get('id');

    	$Jobs = Jobs::findOne(['jobs_id' => $jobs_id]);

    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){

            	// Jobs
                $Jobs->jobs_name_th = Yii::$app->request->post()['Jobs']['jobs_name_th'];
                $Jobs->jobs_name_en = Yii::$app->request->post()['Jobs']['jobs_name_en'];
                $Jobs->jobs_content_th = Yii::$app->request->post()['Jobs']['jobs_content_th'];
                $Jobs->jobs_content_en = Yii::$app->request->post()['Jobs']['jobs_content_en'];
                $Jobs->is_active = Yii::$app->request->post()['Jobs']['is_active'];
                $Jobs->modified_user = 1;
                $Jobs->modified_date = date("Y-m-d H:i:s");
                $Jobs->save();
            }
        }
    	return $this->renderAjax('update', [
			'Jobs' => $Jobs
		]);
    }

    public function actionDelete()
    {
    	$jobs_id = Yii::$app->request->get('id');

    	$Jobs = Jobs::find()
		->where(['jobs_id'=>$jobs_id])
		->one()
		->delete();

		$model = new Jobs();
		$search = Yii::$app->request->queryParams;
        $dataProvider = $model->search($search);
		return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'search' => $search
        ]);
    }
}
