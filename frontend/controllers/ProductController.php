<?php

namespace frontend\controllers;
use yii;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionView()
    {
    	$slug_id = Yii::$app->getRequest()->getQueryParam('slug_id');

    	$models = \common\models\Product::find()
    	->joinWith('productDetails')
        ->where(['product.is_active' => 1])
        ->andWhere(['product.product_id' => $slug_id])
        ->orderBy(['product.product_id' => SORT_ASC])
        ->asArray()
        ->one();

        $meta_tag_title = "meta_tag_title_".Yii::$app->language;
        $meta_tag_description = "meta_tag_description_".Yii::$app->language;
        $meta_tag_keywords = "meta_tag_keywords_".Yii::$app->language;
        Yii::$app->view->title = $models[$meta_tag_title];
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $models[$meta_tag_description]
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $models[$meta_tag_keywords]
        ]);

        return $this->render('view', [
            'product' => $models,
        ]);
    }
}
