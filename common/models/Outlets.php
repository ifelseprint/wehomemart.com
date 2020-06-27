<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "outlets".
 *
 * @property int $outlets_id
 * @property int|null $partner_id
 * @property string $outlets_partner
 * @property string $outlets_code
 * @property string $outlets_name
 * @property string|null $outlets_place
 * @property string|null $outlets_address
 * @property string|null $outlets_district
 * @property string|null $outlets_province
 * @property string|null $outlets_postal_code
 * @property string|null $outlets_contact_name
 * @property string|null $outlets_tel
 * @property int $outlets_type
 * @property string $crdate
 * @property int $cruser
 * @property string $mddate
 * @property int $mduser
 * @property string $is_active
 * @property string|null $company_name
 * @property string|null $branch_code
 * @property string|null $AR_CODE
 * @property string|null $AP_CODE
 * @property string|null $TaxID
 * @property int|null $required_wht
 * @property string|null $email_contact
 * @property bool|null $allow_auto_mail
 * @property bool|null $allow_billpayment
 * @property string|null $sent_fronter_status
 * @property string|null $AR_CODE_OLD
 */
class Outlets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'outlets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partner_id', 'outlets_type', 'cruser', 'mduser', 'required_wht'], 'integer'],
            [['outlets_partner', 'outlets_code', 'outlets_name', 'outlets_type', 'crdate', 'cruser', 'mddate', 'mduser'], 'required'],
            [['outlets_address'], 'string'],
            [['crdate', 'mddate'], 'safe'],
            [['allow_auto_mail', 'allow_billpayment'], 'boolean'],
            [['outlets_partner', 'outlets_code'], 'string', 'max' => 4],
            [['outlets_name', 'outlets_place', 'outlets_contact_name', 'outlets_tel', 'company_name'], 'string', 'max' => 100],
            [['outlets_district', 'outlets_province'], 'string', 'max' => 50],
            [['outlets_postal_code', 'branch_code'], 'string', 'max' => 5],
            [['is_active', 'sent_fronter_status'], 'string', 'max' => 1],
            [['AR_CODE'], 'string', 'max' => 12],
            [['AP_CODE'], 'string', 'max' => 10],
            [['TaxID', 'AR_CODE_OLD'], 'string', 'max' => 20],
            [['email_contact'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'outlets_id' => 'Outlets ID',
            'partner_id' => 'Partner ID',
            'outlets_partner' => 'Outlets Partner',
            'outlets_code' => 'Outlets Code',
            'outlets_name' => 'Outlets Name',
            'outlets_place' => 'Outlets Place',
            'outlets_address' => 'Outlets Address',
            'outlets_district' => 'Outlets District',
            'outlets_province' => 'Outlets Province',
            'outlets_postal_code' => 'Outlets Postal Code',
            'outlets_contact_name' => 'Outlets Contact Name',
            'outlets_tel' => 'Outlets Tel',
            'outlets_type' => 'Outlets Type',
            'crdate' => 'Crdate',
            'cruser' => 'Cruser',
            'mddate' => 'Mddate',
            'mduser' => 'Mduser',
            'is_active' => 'Is Active',
            'company_name' => 'Company Name',
            'branch_code' => 'Branch Code',
            'AR_CODE' => 'Ar Code',
            'AP_CODE' => 'Ap Code',
            'TaxID' => 'Tax ID',
            'required_wht' => 'Required Wht',
            'email_contact' => 'Email Contact',
            'allow_auto_mail' => 'Allow Auto Mail',
            'allow_billpayment' => 'Allow Billpayment',
            'sent_fronter_status' => 'Sent Fronter Status',
            'AR_CODE_OLD' => 'Ar Code Old',
        ];
    }
}
