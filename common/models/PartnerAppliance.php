<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner_appliance".
 *
 * @property int $partner_id
 * @property string $partner_code
 * @property int $appliance_type_id
 * @property int $prod_id
 * @property int|null $package_id
 */
class PartnerAppliance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner_appliance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partner_id', 'partner_code', 'appliance_type_id', 'prod_id'], 'required'],
            [['partner_id', 'appliance_type_id', 'prod_id', 'package_id'], 'integer'],
            [['partner_code'], 'string', 'max' => 4],
            [['partner_id', 'appliance_type_id', 'prod_id'], 'unique', 'targetAttribute' => ['partner_id', 'appliance_type_id', 'prod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'partner_id' => 'Partner ID',
            'partner_code' => 'Partner Code',
            'appliance_type_id' => 'Appliance Type ID',
            'prod_id' => 'Prod ID',
            'package_id' => 'Package ID',
        ];
    }
}
