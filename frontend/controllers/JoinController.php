<?php

namespace frontend\controllers;
use yii;

class JoinController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionView()
    {
        return $this->render('view');
    }
}
