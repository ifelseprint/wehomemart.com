<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Request;
use backend\models\Article;
use common\models\ArticleDetail;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $search = Yii::$app->request->queryParams;
    	$model = new Article();
        $dataProvider = $model->search($search);
        if(Yii::$app->request->isPjax){

        	if(!empty($search['Article']['pageSize'])){
        		$dataProvider->pagination->pageSize = $search['Article']['pageSize'];
        	}
        	return $this->renderPartial('index', [
        		'model' => $model,
            	'dataProvider' => $dataProvider,
            	'search' => $search
        	]);
        }else{
        	return $this->render('index', [
        		'model' => $model,
            	'dataProvider' => $dataProvider,
            	'search' => $search
        	]);

        }
    }
    public function actionCreate()
    {
    	$Article = new Article();
    	$ArticleDetail = new ArticleDetail();

    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){

            	$folder_upload = Yii::getAlias('@frontend').'/web/uploads';
            	$year = date("Y");
		        $month = date("m");

		        $folder = $folder_upload."/".$year;
		        if (!is_dir($folder)) {
		            mkdir($folder);
		        }
		        $folder = $folder_upload."/".$year."/".$month;
		        if (!is_dir($folder)) {
		            mkdir($folder);
		        }
		        $path_folder = $year."/".$month;

            	// Article
            	$Article->article_name_th = Yii::$app->request->post()['Article']['article_name_th'];
            	$Article->article_name_en = Yii::$app->request->post()['Article']['article_name_en'];
            	$Article->article_content_th = Yii::$app->request->post()['Article']['article_content_th'];
            	$Article->article_content_en = Yii::$app->request->post()['Article']['article_content_en'];
            	$Article->article_image = UploadedFile::getInstance($Article, 'article_image');
            	if(!empty($Article->article_image)){
				$article_image_file  = $Article->article_image->baseName.'_'.time().'.'.$Article->article_image->extension;
				$article_image_path  = $folder_upload."/".$path_folder."/".$article_image_file;
				$Article->article_image->saveAs($article_image_path);
				$Article->article_image = $article_image_file;
				$Article->article_image_path = $path_folder;
				}
				$Article->is_active = Yii::$app->request->post()['Article']['is_active'];
				$Article->created_user = 1;
				$Article->created_date = date("Y-m-d H:i:s");
				$Article->modified_user = 1;
				$Article->modified_date = date("Y-m-d H:i:s");
				$Article->save();

				// Article Detail
				$ArticleDetail->article_id = Yii::$app->db->getLastInsertID();
				$ArticleDetail->article_detail_content_th = Yii::$app->request->post()['ArticleDetail']['article_detail_content_th'];
            	$ArticleDetail->article_detail_content_en = Yii::$app->request->post()['ArticleDetail']['article_detail_content_en'];
				$ArticleDetail->save();
            }
        }
        return $this->renderAjax('create', [
			'Article' => $Article,
			'ArticleDetail' => $ArticleDetail,
		]);
    }

    public function actionUpdate()
    {
    	$article_id = Yii::$app->request->get('id');

    	$Article = Article::findOne(['article_id' => $article_id]);
    	$ArticleDetail = ArticleDetail::findOne(['article_id' => $article_id]);


    	if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){

            	$folder_upload = Yii::getAlias('@frontend').'/web/uploads';
            	$year = date("Y");
		        $month = date("m");

		        $folder = $folder_upload."/".$year;
		        if (!is_dir($folder)) {
		            mkdir($folder);
		        }
		        $folder = $folder_upload."/".$year."/".$month;
		        if (!is_dir($folder)) {
		            mkdir($folder);
		        }
		        $path_folder = $year."/".$month;

            	// Article
            	$Article->article_name_th = Yii::$app->request->post()['Article']['article_name_th'];
            	$Article->article_name_en = Yii::$app->request->post()['Article']['article_name_en'];
            	$Article->article_content_th = Yii::$app->request->post()['Article']['article_content_th'];
            	$Article->article_content_en = Yii::$app->request->post()['Article']['article_content_en'];
            	$Article->article_image = UploadedFile::getInstance($Article, 'article_image');

            	if(!empty($Article->article_image)){
				$article_image_file  = $Article->article_image->baseName.'_'.time().'.'.$Article->article_image->extension;
				$article_image_path  = $folder_upload."/".$path_folder."/".$article_image_file;
				$Article->article_image->saveAs($article_image_path);
				$Article->article_image = $article_image_file;
				$Article->article_image_path = $path_folder;
				}else{
				$Article->article_image = $Article->getOldAttribute('article_image');
				$Article->article_image_path = $Article->getOldAttribute('article_image_path');
				}
				$Article->is_active = Yii::$app->request->post()['Article']['is_active'];
				$Article->modified_user = 1;
				$Article->modified_date = date("Y-m-d H:i:s");
				$Article->save();

				// Article detail
				$ArticleDetail->article_detail_content_th = Yii::$app->request->post()['ArticleDetail']['article_detail_content_th'];
            	$ArticleDetail->article_detail_content_en = Yii::$app->request->post()['ArticleDetail']['article_detail_content_en'];
				$ArticleDetail->save();
            }
        }
    	return $this->renderAjax('update', [
			'Article' => $Article,
			'ArticleDetail' => $ArticleDetail,
		]);
    }

    public function actionDelete()
    {
    	$article_id = Yii::$app->request->get('id');

    	$ArticleDetail = ArticleDetail::find()
		->where(['article_id'=>$article_id])
		->one()
		->delete();

    	$Article = Article::find()
		->where(['article_id'=>$article_id])
		->one()
		->delete();

		$model = new Article();
		$search = Yii::$app->request->queryParams;
        $dataProvider = $model->search($search);
		return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'search' => $search
        ]);
    }
}
