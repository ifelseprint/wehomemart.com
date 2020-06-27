<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "appliance_type".
 *
 * @property int $appliance_type_id
 * @property string $appliance_type_name
 * @property string|null $appliance_type_name_th
 * @property int $appliance_type_group
 * @property int $appliance_type_size
 * @property string $is_active
 * @property int|null $appliance_set_id
 * @property int|null $appliance_set_id_uw
 * @property string|null $meppay_department_id
 */
class ApplianceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appliance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appliance_type_name', 'appliance_type_group', 'appliance_type_size'], 'required'],
            [['appliance_type_group', 'appliance_type_size', 'appliance_set_id', 'appliance_set_id_uw'], 'integer'],
            [['appliance_type_name', 'appliance_type_name_th'], 'string', 'max' => 100],
            [['is_active'], 'string', 'max' => 1],
            [['meppay_department_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'appliance_type_id' => 'Appliance Type ID',
            'appliance_type_name' => 'Appliance Type Name',
            'appliance_type_name_th' => 'Appliance Type Name Th',
            'appliance_type_group' => 'Appliance Type Group',
            'appliance_type_size' => 'Appliance Type Size',
            'is_active' => 'Is Active',
            'appliance_set_id' => 'Appliance Set ID',
            'appliance_set_id_uw' => 'Appliance Set Id Uw',
            'meppay_department_id' => 'Meppay Department ID',
        ];
    }
}
