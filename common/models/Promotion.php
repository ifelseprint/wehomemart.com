<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property int $promotion_id
 * @property string|null $promotion_name_th
 * @property string|null $promotion_name_en
 * @property string|null $promotion_image_th
 * @property string|null $promotion_image_en
 * @property string|null $promotion_image_path
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property int|null $pageview
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_user', 'modified_user', 'pageview'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['promotion_name_th', 'promotion_name_en', 'promotion_image_path'], 'string', 'max' => 100],
            [['promotion_image_th', 'promotion_image_en'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'promotion_id' => 'Promotion ID',
            'promotion_name_th' => 'Promotion Name Th',
            'promotion_name_en' => 'Promotion Name En',
            'promotion_image_th' => 'Promotion Image Th',
            'promotion_image_en' => 'Promotion Image En',
            'promotion_image_path' => 'Promotion Image Path',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'pageview' => 'Pageview',
        ];
    }
}
