<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $service_id
 * @property string|null $service_name_th
 * @property string|null $service_name_en
 * @property string|null $service_icon
 * @property string|null $service_image
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
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
            [['service_name_th', 'service_name_en'], 'string', 'max' => 100],
            [['service_icon', 'service_image'], 'string', 'max' => 50],
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
            'service_icon' => 'Service Icon',
            'service_image' => 'Service Image',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
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
