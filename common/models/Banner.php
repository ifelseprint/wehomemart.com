<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $banner_id
 * @property int|null $banner_page_id
 * @property int|null $banner_mapping_id
 * @property string|null $banner_image_1
 * @property string|null $banner_image_1_path
 * @property string|null $banner_image_2
 * @property string|null $banner_image_2_path
 * @property string|null $banner_image_3
 * @property string|null $banner_image_3_path
 * @property string|null $banner_image_4
 * @property string|null $banner_image_4_path
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property int|null $pageview
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banner_page_id', 'banner_mapping_id', 'is_active', 'created_user', 'modified_user', 'pageview'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['banner_image_1', 'banner_image_2', 'banner_image_3', 'banner_image_4'], 'string', 'max' => 50],
            [['banner_image_1_path', 'banner_image_2_path', 'banner_image_3_path', 'banner_image_4_path'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'banner_page_id' => 'Banner Page ID',
            'banner_mapping_id' => 'Banner Mapping ID',
            'banner_image_1' => 'Banner Image 1',
            'banner_image_1_path' => 'Banner Image 1 Path',
            'banner_image_2' => 'Banner Image 2',
            'banner_image_2_path' => 'Banner Image 2 Path',
            'banner_image_3' => 'Banner Image 3',
            'banner_image_3_path' => 'Banner Image 3 Path',
            'banner_image_4' => 'Banner Image 4',
            'banner_image_4_path' => 'Banner Image 4 Path',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'pageview' => 'Pageview',
        ];
    }
}
