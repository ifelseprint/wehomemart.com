<?php
namespace frontend\controllers;
use common\models\Promotion;
use yii;
class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Promotion = Promotion::findAll(['is_active' => 1]);
        return $this->render('index', [
    		'Promotion' => $Promotion,
    	]);
    }

}
