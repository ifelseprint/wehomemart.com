<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Article;
class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $Article = \common\models\Article::find()
        ->where(['is_active' => 1])
        ->orderBy(['article_id' => SORT_ASC])
        ->all();
        return $this->render('index', [
            'Article' => $Article,
        ]);
    }

    public function actionView()
    {
        $slug_id = Yii::$app->getRequest()->getQueryParam('slug_id');

        $Article = Article::find()
        ->joinWith('articleDetails')
        ->where(['article.is_active' => 1])
        ->andWhere(['article.article_id' => $slug_id])
        ->orderBy(['article.article_id' => SORT_ASC])
        ->one();
        return $this->render('view', [
            'Article' => $Article,
        ]);
    }

}

