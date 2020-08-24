<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_detail".
 *
 * @property int $service_detail_id
 * @property int|null $service_id
 * @property string|null $service_detail_content_th
 * @property string|null $service_detail_content_en
 *
 * @property Service $service
 */
class ServiceDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'integer'],
            [['service_detail_content_th', 'service_detail_content_en'], 'string'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'service_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_detail_id' => 'Service Detail ID',
            'service_id' => 'Service ID',
            'service_detail_content_th' => 'Service Detail Content Th',
            'service_detail_content_en' => 'Service Detail Content En',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['service_id' => 'service_id']);
    }
}
