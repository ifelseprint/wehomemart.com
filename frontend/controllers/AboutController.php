<?php

namespace frontend\controllers;
use yii;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
