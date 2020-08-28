<?php

namespace frontend\controllers;
use yii;

class ServiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Service = \common\models\Service::find()
    	->joinWith('serviceDetails')
        ->where(['service.is_active' => 1])
        ->orderBy(['service.service_id' => SORT_ASC])
        ->all();
        return $this->render('index', [
            'Service' => $Service,
        ]);
    }
    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $Service = \common\models\Service::find()
        ->joinWith('serviceDetails')
        ->where(['service.is_active' => 1])
        ->andWhere(['service.service_id' => $id])
        ->orderBy(['service.service_id' => SORT_ASC])
        ->one();

        $Banner = \common\models\Banner::find()
        ->where(['banner_page_id' => 2])
        ->andWhere(['banner_mapping_id' => $id])
        ->one();
        return $this->renderAjax('view', [
            'Service' => $Service,
            'Banner' => $Banner
        ]);
    }
}
