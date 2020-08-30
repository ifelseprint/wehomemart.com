<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $page_id
 * @property string|null $page_name_th
 * @property string|null $page_name_en
 * @property string|null $meta_tag_title_th
 * @property string|null $meta_tag_title_en
 * @property string|null $meta_tag_description_th
 * @property string|null $meta_tag_description_en
 * @property string|null $meta_tag_keywords_th
 * @property string|null $meta_tag_keywords_en
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property int|null $pageview
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_tag_title_th', 'meta_tag_title_en', 'meta_tag_description_th', 'meta_tag_description_en', 'meta_tag_keywords_th', 'meta_tag_keywords_en'], 'string'],
            [['is_active', 'modified_user', 'pageview'], 'integer'],
            [['modified_date'], 'safe'],
            [['page_name_th', 'page_name_en'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'page_name_th' => 'Page Name Th',
            'page_name_en' => 'Page Name En',
            'meta_tag_title_th' => 'Meta Tag Title Th',
            'meta_tag_title_en' => 'Meta Tag Title En',
            'meta_tag_description_th' => 'Meta Tag Description Th',
            'meta_tag_description_en' => 'Meta Tag Description En',
            'meta_tag_keywords_th' => 'Meta Tag Keywords Th',
            'meta_tag_keywords_en' => 'Meta Tag Keywords En',
            'is_active' => '0 = inactive, 1 = active',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'pageview' => 'Pageview',
        ];
    }
}
