<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Banner;
use yii\helpers\Url;
use yii\filters\AccessControl;
class BannerController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'], // @ = login, ? = no login
                    ],
                ],
            ],
        ];
    }
    public function actionDelete()
    {
        $id = Yii::$app->request->queryParams['id'];
        $banner_id = Yii::$app->request->post()['banner_id'];
        $field_image = 'banner_image_'.$id;
        $field_path = 'banner_image_'.$id.'_path';
        $Banner = Banner::findOne(['banner_page_id' => 2,'banner_mapping_id' => $banner_id]);
        $Banner->$field_image = null;
        $Banner->$field_path = null;
        $Banner->save();
    }
    
}
