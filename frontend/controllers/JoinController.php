<?php

namespace frontend\controllers;
use yii;
use common\models\Jobs;
class JoinController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Jobs = Jobs::findAll(['is_active' => 1]);
        return $this->render('index', [
    		'Jobs' => $Jobs,
    	]);
    }
    public function actionView()
    {
        return $this->render('view');
    }
}
