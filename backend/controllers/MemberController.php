<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Users;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
class MemberController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','excel'],
                        'allow' => true,
                        'roles' => ['@'], // @ = login, ? = no login
                    ],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        $search = Yii::$app->request->queryParams;
    	$model = new Users();
        $dataProvider = $model->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['User']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['User']['pageSize'];
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
    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $Users = Users::findOne(['login_id' => $id]);

        $Users->user_district = $this->convert('\common\models\Districts','name_'.Yii::$app->language,'id',$Users->user_district);
        $Users->user_amphur = $this->convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$Users->user_amphur);
        $Users->user_province = $this->convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$Users->user_province);

        return $this->renderAjax('view', [
            'Users' => $Users,
        ]);
    }

    public function actionExcel()
    {
        set_time_limit(0);
        $post = Yii::$app->request->post();

        if(Yii::$app->request->isPost){

            $searchModel = new Users();
            $dataExcel = $searchModel->search($post);

            if(!empty($post['Users'])){
                $dataExcel->pagination->pageSize = $post['Users']['pageSize'];
            }

            if(empty($dataExcel->models)){
                return json_encode([
                    "status" => false,
                    "result" => 'No data generate report.'
                ]);
                exit;
            }
            return $this->render('excel-report', [
                "status" => true,
                "result" => 'Generate report successfully.',
                'search' => $post['Users'],
                'dataExcel' => $dataExcel->models,
            ]);
        }
    }

    public function convert($model,$return_field,$where_field,$id)
    {

        $models = $model::find()
        ->where([''.$where_field.'' => $id])
        ->asArray()
        ->one();
        return $models[$return_field];
    }
}
