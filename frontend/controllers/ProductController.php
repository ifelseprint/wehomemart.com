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
    	$slug = Yii::$app->slug->mapping(Yii::$app->getRequest()->getQueryParam('slug'));
    	$select_field = 'product_name_'.Yii::$app->language;

    	$models = \common\models\Product::find()
    	->joinWith('productDetails')
        ->where(['is_active' => 1])
        ->andWhere(['like', $select_field, '%'.$slug .'%', false])
        ->orderBy(['product_id' => SORT_ASC])
        ->asArray()
        ->one();

        return $this->render('view', [
            'product' => $models,
        ]);
    }
}
