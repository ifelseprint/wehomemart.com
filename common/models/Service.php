<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $service_id
 * @property string|null $service_name_th
 * @property string|null $service_name_en
 * @property string|null $service_content_th
 * @property string|null $service_content_en
 * @property string|null $service_image
 * @property string|null $service_image_path
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property string|null $meta_tag_title_th
 * @property string|null $meta_tag_title_en
 * @property string|null $meta_tag_description_th
 * @property string|null $meta_tag_description_en
 * @property string|null $meta_tag_keywords_th
 * @property string|null $meta_tag_keywords_en
 *
 * @property ServiceDetail[] $serviceDetails
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_user', 'modified_user'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['meta_tag_title_th', 'meta_tag_title_en', 'meta_tag_description_th', 'meta_tag_description_en', 'meta_tag_keywords_th', 'meta_tag_keywords_en'], 'string'],
            [['service_name_th', 'service_name_en'], 'string', 'max' => 100],
            [['service_content_th', 'service_content_en'], 'string', 'max' => 255],
            [['service_image', 'service_image_path'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'service_name_th' => 'Service Name Th',
            'service_name_en' => 'Service Name En',
            'service_content_th' => 'Service Content Th',
            'service_content_en' => 'Service Content En',
            'service_image' => 'Service Image',
            'service_image_path' => 'Service Image Path',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'meta_tag_title_th' => 'Meta Tag Title Th',
            'meta_tag_title_en' => 'Meta Tag Title En',
            'meta_tag_description_th' => 'Meta Tag Description Th',
            'meta_tag_description_en' => 'Meta Tag Description En',
            'meta_tag_keywords_th' => 'Meta Tag Keywords Th',
            'meta_tag_keywords_en' => 'Meta Tag Keywords En',
        ];
    }

    /**
     * Gets query for [[ServiceDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceDetails()
    {
        return $this->hasMany(ServiceDetail::className(), ['service_id' => 'service_id']);
    }
}
