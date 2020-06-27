<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract_detail".
 *
 * @property int $contract_id
 * @property int $partner_id
 * @property int $outlets_id
 * @property string|null $is_active Y/N/D-->delete/T-->test
 * @property string|null $crdate
 * @property int|null $cruser
 * @property string|null $mddate
 * @property int|null $mduser
 */
class ContractDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partner_id', 'outlets_id'], 'required'],
            [['partner_id', 'outlets_id', 'cruser', 'mduser'], 'integer'],
            [['crdate', 'mddate'], 'safe'],
            [['is_active'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contract_id' => 'Contract ID',
            'partner_id' => 'Partner ID',
            'outlets_id' => 'Outlets ID',
            'is_active' => 'Is Active',
            'crdate' => 'Crdate',
            'cruser' => 'Cruser',
            'mddate' => 'Mddate',
            'mduser' => 'Mduser',
        ];
    }
}
