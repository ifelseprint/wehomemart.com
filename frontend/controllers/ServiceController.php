<?php

namespace frontend\controllers;
use yii;
use common\models\Banner;
class ServiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $Pages = \common\models\Pages::findOne(['is_active' => 1,'page_id' => 2]);
        $meta_tag_title = "meta_tag_title_".Yii::$app->language;
        $meta_tag_description = "meta_tag_description_".Yii::$app->language;
        $meta_tag_keywords = "meta_tag_keywords_".Yii::$app->language;

        Yii::$app->view->title = $Pages->$meta_tag_title;
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $Pages->$meta_tag_description
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $Pages->$meta_tag_keywords
        ]);

        $Banner = Banner::findOne(['is_active' => 1,'banner_page_id' => 5,'banner_mapping_id' => 1,]);
    	$Service = \common\models\Service::find()
    	->joinWith('serviceDetails')
        ->where(['service.is_active' => 1])
        ->orderBy(['service.service_id' => SORT_ASC])
        ->all();
        return $this->render('index', [
            'Service' => $Service,
            'Banner' => $Banner
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

        $meta_tag_title = "meta_tag_title_".Yii::$app->language;
        $meta_tag_description = "meta_tag_description_".Yii::$app->language;
        $meta_tag_keywords = "meta_tag_keywords_".Yii::$app->language;
        Yii::$app->view->title = $Service->$meta_tag_title;
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $Service->$meta_tag_description
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $Service->$meta_tag_keywords
        ]);

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
