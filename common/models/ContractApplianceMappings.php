<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract_appliance_mappings".
 *
 * @property int $contract_id
 * @property int $appliance_set_id
 * @property int $package_id
 */
class ContractApplianceMappings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract_appliance_mappings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contract_id', 'appliance_set_id', 'package_id'], 'required'],
            [['contract_id', 'appliance_set_id', 'package_id'], 'integer'],
            [['contract_id', 'appliance_set_id'], 'unique', 'targetAttribute' => ['contract_id', 'appliance_set_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contract_id' => 'Contract ID',
            'appliance_set_id' => 'Appliance Set ID',
            'package_id' => 'Package ID',
        ];
    }
}
