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

        $Quotation->quotation_district = $this->convert('\common\models\Districts','name_'.Yii::$app->language,'id',$Quotation->quotation_district);
        $Quotation->quotation_amphur = $this->convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$Quotation->quotation_amphur);
        $Quotation->quotation_province = $this->convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$Quotation->quotation_province);

        $Quotation->quotation_delivery_tax_district = $this->convert('\common\models\Districts','name_'.Yii::$app->language,'id',$Quotation->quotation_delivery_tax_district);
        $Quotation->quotation_delivery_tax_amphur = $this->convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$Quotation->quotation_delivery_tax_amphur);
        $Quotation->quotation_delivery_tax_province = $this->convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$Quotation->quotation_delivery_tax_province);

        $Quotation->quotation_delivery_other_district = $this->convert('\common\models\Districts','name_'.Yii::$app->language,'id',$Quotation->quotation_delivery_other_district);
        $Quotation->quotation_delivery_other_amphur = $this->convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$Quotation->quotation_delivery_other_amphur);
        $Quotation->quotation_delivery_other_province = $this->convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$Quotation->quotation_delivery_other_province);

        $ProjectCategory = \common\models\ProjectCategory::find()
        ->where(['project_category_id'=> $Quotation->quotation_project_category_id])
        ->one();

        $QuotationProductMapping = \frontend\models\QuotationProductMapping::find()
        ->where(['quotation_id'=> $id])
        ->all();

        $QuotationProductImageMapping = \common\models\QuotationProductImageMapping::find()
        ->where(['quotation_id'=> $id])
        ->all();

        return $this->renderAjax('view', [
            'Quotation' => $Quotation,
            'ProjectCategory' => $ProjectCategory,
            'QuotationProductMapping' => $QuotationProductMapping,
            'QuotationProductImageMapping' => $QuotationProductImageMapping
        ]);
    }

    public function actionExcel()
    {
        set_time_limit(0);
        $post = Yii::$app->request->post();

        if(Yii::$app->request->isPost){

            $searchModel = new Quotation();
            $dataExcel = $searchModel->search($post);

            if(!empty($post['Quotation'])){
                $dataExcel->pagination->pageSize = $post['Quotation']['pageSize'];
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
                'search' => $post['Quotation'],
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
