<?php
namespace frontend\controllers;
use common\models\Promotion;
use common\models\Product;
use common\models\Service;
use yii;
class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Promotion = Promotion::findAll(['is_active' => 1]);
    	$Product = Product::findAll(['is_active' => 1]);
    	$Service = Service::findAll(['is_active' => 1]);
        return $this->render('index', [
    		'Promotion' => $Promotion,
    		'Product' => $Product,
    		'Service' => $Service,
    	]);
    }

}
