<?php
namespace frontend\controllers;
use yii;
class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
