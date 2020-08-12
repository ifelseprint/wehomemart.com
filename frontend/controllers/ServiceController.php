<?php

namespace frontend\controllers;
use yii;

class ServiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$slug_id = Yii::$app->getRequest()->getQueryParam('slug_id');

    	$models = \common\models\Service::find()
    	->joinWith('serviceDetails')
        ->where(['service.is_active' => 1])
        ->andWhere(['service.service_id' => $slug_id])
        ->orderBy(['service.service_id' => SORT_ASC])
        ->asArray()
        ->one();

        return $this->render('index', [
            'service' => $models,
        ]);
    }
    public function actionView()
    {

        return $this->renderPartial('view', [
            // 'service' => $models,
        ]);
    }
}
