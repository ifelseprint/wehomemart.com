<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_detail".
 *
 * @property int $article_detail_id
 * @property int|null $article_id
 * @property string|null $article_detail_content_th
 * @property string|null $article_detail_content_en
 * @property string|null $article_detail_image
 *
 * @property Article $article
 */
class ArticleDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id'], 'integer'],
            [['article_detail_content_th', 'article_detail_content_en'], 'string'],
            [['article_detail_image'], 'string', 'max' => 50],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'article_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_detail_id' => 'Article Detail ID',
            'article_id' => 'Article ID',
            'article_detail_content_th' => 'Article Detail Content Th',
            'article_detail_content_en' => 'Article Detail Content En',
            'article_detail_image' => 'Article Detail Image',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['article_id' => 'article_id']);
    }
}
