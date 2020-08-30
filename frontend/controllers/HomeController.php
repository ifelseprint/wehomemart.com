<?php
namespace frontend\controllers;
use common\models\Banner;
use common\models\Promotion;
use common\models\Product;
use common\models\Service;
use common\models\Article;
use yii;
class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $Banner = Banner::findOne(['is_active' => 1,'banner_page_id' => 1,'banner_mapping_id' => 1,]);
    	$Promotion = Promotion::findAll(['is_active' => 1]);
    	$Product = Product::findAll(['is_active' => 1]);
    	$Service = Service::find()
    	->where(['is_active' => 1])
    	->orderBy(['service_id'=> SORT_ASC])
    	->offset(0)
        ->limit(2)
    	->all();
        $Article = Article::findAll(['is_active' => 1]);
        return $this->render('index', [
            'Banner' => $Banner,
    		'Promotion' => $Promotion,
    		'Product' => $Product,
    		'Service' => $Service,
            'Article' => $Article
    	]);
    }

}
