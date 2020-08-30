<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $article_id
 * @property string|null $article_name_th
 * @property string|null $article_name_en
 * @property string|null $article_content_th
 * @property string|null $article_content_en
 * @property string|null $article_image
 * @property string|null $article_image_path
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property int|null $pageview
 * @property string|null $meta_tag_title_th
 * @property string|null $meta_tag_title_en
 * @property string|null $meta_tag_description_th
 * @property string|null $meta_tag_description_en
 * @property string|null $meta_tag_keywords_th
 * @property string|null $meta_tag_keywords_en
 *
 * @property ArticleDetail[] $articleDetails
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_user', 'modified_user', 'pageview'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['meta_tag_title_th', 'meta_tag_title_en', 'meta_tag_description_th', 'meta_tag_description_en', 'meta_tag_keywords_th', 'meta_tag_keywords_en'], 'string'],
            [['article_name_th', 'article_name_en'], 'string', 'max' => 100],
            [['article_content_th', 'article_content_en'], 'string', 'max' => 255],
            [['article_image', 'article_image_path'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'article_name_th' => 'Article Name Th',
            'article_name_en' => 'Article Name En',
            'article_content_th' => 'Article Content Th',
            'article_content_en' => 'Article Content En',
            'article_image' => 'Article Image',
            'article_image_path' => 'Article Image Path',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'pageview' => 'Pageview',
            'meta_tag_title_th' => 'Meta Tag Title Th',
            'meta_tag_title_en' => 'Meta Tag Title En',
            'meta_tag_description_th' => 'Meta Tag Description Th',
            'meta_tag_description_en' => 'Meta Tag Description En',
            'meta_tag_keywords_th' => 'Meta Tag Keywords Th',
            'meta_tag_keywords_en' => 'Meta Tag Keywords En',
        ];
    }

    /**
     * Gets query for [[ArticleDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleDetails()
    {
        return $this->hasMany(ArticleDetail::className(), ['article_id' => 'article_id']);
    }
}
