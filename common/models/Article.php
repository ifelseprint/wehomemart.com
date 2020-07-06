<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $article_id
 * @property string|null $article_name_th
 * @property string|null $article_name_en
 * @property string|null $article_image
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
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
            [['is_active', 'created_user', 'modified_user'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['article_name_th', 'article_name_en'], 'string', 'max' => 100],
            [['article_image'], 'string', 'max' => 50],
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
            'article_image' => 'Article Image',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
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
