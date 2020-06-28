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

        return $this->render('view', [
            'product' => $models,
        ]);
    }
}
