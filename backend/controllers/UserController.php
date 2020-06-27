<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\User;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
class UserController extends Controller
{
    public function actionIndex()
    {
        $this->redirect(['/user/view']);
    }

    public function actionView()
    {
        $search = Yii::$app->request->queryParams;
    	$searchModel = new User();
        $dataProvider = $searchModel->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['User']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['User']['pageSize'];
        	}
        	return $this->renderPartial('view', [
        		'model' => $searchModel,
            	'dataProvider' => $dataProvider,
            	'search' => $search
        	]);
        }else{
        	return $this->render('view', [
        		'model' => $searchModel,
            	'dataProvider' => $dataProvider,
            	'search' => $search
        	]);

        }
    }

}
