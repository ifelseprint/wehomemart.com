<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_listallpolicy_search".
 *
 * @property int $pol_id
 * @property int $pol_seq
 * @property string|null $pol_service_no
 * @property string $pol_holder_name
 * @property string|null $pol_date
 * @property string|null $pol_model
 * @property string|null $pol_status 1=Purchase ,2 Cancel
 * @property string|null $appliance_type_name
 * @property string|null $appliance_type_name_th
 * @property string|null $brand_name
 * @property string|null $outlets_name
 * @property int|null $contract_partner_id
 * @property string|null $crdate
 * @property int|null $contract_contract_id
 * @property int|null $contract_prod_id
 * @property int|null $contract_outlets_id
 * @property int|null $pol_appliance_type
 * @property string|null $pol_brand
 * @property string|null $pol_brand_id
 * @property string|null $pol_holder_firstname
 * @property string|null $pol_holder_lastname
 * @property string|null $pol_serial_no
 * @property string|null $pol_ticket_number
 * @property int|null $package_id
 */
class VListallpolicySearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_listallpolicy_search';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pol_id'], 'required'],
            [['pol_id', 'pol_seq', 'contract_partner_id', 'contract_contract_id', 'contract_prod_id', 'contract_outlets_id', 'pol_appliance_type', 'package_id'], 'integer'],
            [['pol_date', 'crdate'], 'safe'],
            [['pol_service_no'], 'string', 'max' => 20],
            [['pol_holder_name'], 'string', 'max' => 201],
            [['pol_model', 'appliance_type_name', 'appliance_type_name_th', 'brand_name', 'outlets_name', 'pol_holder_firstname', 'pol_holder_lastname', 'pol_serial_no', 'pol_ticket_number'], 'string', 'max' => 100],
            [['pol_status'], 'string', 'max' => 1],
            [['pol_brand', 'pol_brand_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pol_id' => 'Pol ID',
            'pol_seq' => 'Pol Seq',
            'pol_service_no' => 'Pol Service No',
            'pol_holder_name' => 'Pol Holder Name',
            'pol_date' => 'Pol Date',
            'pol_model' => 'Pol Model',
            'pol_status' => 'Pol Status',
            'appliance_type_name' => 'Appliance Type Name',
            'appliance_type_name_th' => 'Appliance Type Name Th',
            'brand_name' => 'Brand Name',
            'outlets_name' => 'Outlets Name',
            'contract_partner_id' => 'Contract Partner ID',
            'crdate' => 'Crdate',
            'contract_contract_id' => 'Contract Contract ID',
            'contract_prod_id' => 'Contract Prod ID',
            'contract_outlets_id' => 'Contract Outlets ID',
            'pol_appliance_type' => 'Pol Appliance Type',
            'pol_brand' => 'Pol Brand',
            'pol_brand_id' => 'Pol Brand ID',
            'pol_holder_firstname' => 'Pol Holder Firstname',
            'pol_holder_lastname' => 'Pol Holder Lastname',
            'pol_serial_no' => 'Pol Serial No',
            'pol_ticket_number' => 'Pol Ticket Number',
            'package_id' => 'Package ID',
        ];
    }
}
