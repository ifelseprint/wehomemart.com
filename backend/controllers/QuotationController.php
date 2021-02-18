<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Quotation;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
class QuotationController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view'],
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
    	$model = new Quotation();
        $dataProvider = $model->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['Quotation']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['Quotation']['pageSize'];
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
        $Quotation = Quotation::findOne(['quotation_id' => $id]);

        $Quotation->quotation_district = $this->convert('\common\models\Districts',$Quotation->quotation_district);
        $Quotation->quotation_amphur = $this->convert('\common\models\Amphures',$Quotation->quotation_amphur);
        $Quotation->quotation_province = $this->convert('\common\models\Provinces',$Quotation->quotation_province);

        $Quotation->quotation_delivery_district = $this->convert('\common\models\Districts',$Quotation->quotation_delivery_district);
        $Quotation->quotation_delivery_amphur = $this->convert('\common\models\Amphures',$Quotation->quotation_delivery_amphur);
        $Quotation->quotation_delivery_province = $this->convert('\common\models\Provinces',$Quotation->quotation_delivery_province);

        $ProjectCategory = \common\models\ProjectCategory::find()
        ->where(['project_category_id'=> $Quotation->quotation_project_category_id])
        ->one();

        $QuotationProductMapping = \frontend\models\QuotationProductMapping::find()
        ->where(['quotation_id'=> $id])
        ->all();

        return $this->renderAjax('view', [
            'Quotation' => $Quotation,
            'ProjectCategory' => $ProjectCategory,
            'QuotationProductMapping' => $QuotationProductMapping,
        ]);
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
