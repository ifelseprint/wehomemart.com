<?php

namespace frontend\controllers;
use yii;
use common\models\Banner;
class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Pages = \common\models\Pages::findOne(['is_active' => 1,'page_id' => 3]);
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
    	$Banner = Banner::findOne(['is_active' => 1,'banner_page_id' => 3,'banner_mapping_id' => 1,]);
        return $this->render('index', [
            'Banner' => $Banner,
    	]);
    }
}
