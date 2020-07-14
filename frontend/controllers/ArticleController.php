<?php

namespace frontend\controllers;

use Yii;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $slug_id = Yii::$app->getRequest()->getQueryParam('slug_id');
        return $this->render('index');
    }

    public function actionView()
    {
        $slug_id = Yii::$app->getRequest()->getQueryParam('slug_id');
        return $this->render('view');
    }

}

