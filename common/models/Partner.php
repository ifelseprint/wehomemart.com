<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property int $partner_id
 * @property string|null $partner_code
 * @property string|null $partner_name
 * @property string|null $partner_program
 * @property string|null $partner_desc
 * @property string|null $partner_logo
 * @property string|null $partner_login_code
 * @property string|null $partner_company
 * @property string|null $partner_address
 * @property string|null $partner_district
 * @property string|null $partner_province
 * @property string|null $partner_postal_code
 * @property string|null $partner_phone
 * @property string|null $partner_fax
 * @property string|null $partner_website
 * @property string|null $partner_tax_id Tax id number
 * @property int|null $partner_receipt_tax_invoice \'Y/N\'
 * @property string|null $is_active \'Y/N/D-->Delete/T -> Test\'
 * @property string|null $is_chanel_online
 * @property string|null $crdate
 * @property int|null $cruser
 * @property string|null $mddate
 * @property int|null $mduser
 * @property string|null $ew_helpline
 * @property string|null $ad_helpline
 * @property int|null $exceptServiceFeeEW Show EW Service Fee on Certificate <1 no show>
 * @property int|null $exceptServiceFeeAD Show AD Service Fee on Certificate <1 no show>
 * @property string|null $GRP_CODE
 * @property string|null $HQ_CODE
 * @property string|null $CLI_CODE
 * @property string|null $contact_email
 * @property string|null $appliancetype_mail
 * @property string|null $branchcode
 * @property string|null $AR_CODE
 * @property string|null $AP_CODE
 * @property int|null $billing_type
 * @property int|null $required_wht
 * @property string|null $email_contact Invoice email
 * @property bool|null $allow_auto_mail
 * @property bool|null $allow_billpayment
 * @property string|null $sent_fronter_status
 * @property bool|null $sale_report_saleperson
 * @property bool|null $sale_report_keyed_in
 * @property string|null $AR_CODE_OLD
 * @property string|null $currency_code
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partner_id'], 'required'],
            [['partner_id', 'partner_receipt_tax_invoice', 'cruser', 'mduser', 'exceptServiceFeeEW', 'exceptServiceFeeAD', 'billing_type', 'required_wht'], 'integer'],
            [['partner_program', 'partner_desc', 'partner_address', 'is_chanel_online', 'currency_code'], 'string'],
            [['crdate', 'mddate'], 'safe'],
            [['allow_auto_mail', 'allow_billpayment', 'sale_report_saleperson', 'sale_report_keyed_in'], 'boolean'],
            [['partner_code'], 'string', 'max' => 4],
            [['partner_name', 'partner_logo', 'partner_company'], 'string', 'max' => 100],
            [['partner_login_code'], 'string', 'max' => 30],
            [['partner_district', 'partner_province', 'partner_tax_id', 'ew_helpline', 'ad_helpline', 'contact_email'], 'string', 'max' => 50],
            [['partner_postal_code', 'GRP_CODE', 'HQ_CODE', 'branchcode'], 'string', 'max' => 5],
            [['partner_phone', 'partner_fax', 'partner_website', 'email_contact'], 'string', 'max' => 150],
            [['is_active', 'sent_fronter_status'], 'string', 'max' => 1],
            [['CLI_CODE', 'AP_CODE', 'AR_CODE_OLD'], 'string', 'max' => 10],
            [['appliancetype_mail'], 'string', 'max' => 255],
            [['AR_CODE'], 'string', 'max' => 20],
            [['partner_id'], 'unique'],
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
            'partner_name' => 'Partner Name',
            'partner_program' => 'Partner Program',
            'partner_desc' => 'Partner Desc',
            'partner_logo' => 'Partner Logo',
            'partner_login_code' => 'Partner Login Code',
            'partner_company' => 'Partner Company',
            'partner_address' => 'Partner Address',
            'partner_district' => 'Partner District',
            'partner_province' => 'Partner Province',
            'partner_postal_code' => 'Partner Postal Code',
            'partner_phone' => 'Partner Phone',
            'partner_fax' => 'Partner Fax',
            'partner_website' => 'Partner Website',
            'partner_tax_id' => 'Partner Tax ID',
            'partner_receipt_tax_invoice' => 'Partner Receipt Tax Invoice',
            'is_active' => 'Is Active',
            'is_chanel_online' => 'Is Chanel Online',
            'crdate' => 'Crdate',
            'cruser' => 'Cruser',
            'mddate' => 'Mddate',
            'mduser' => 'Mduser',
            'ew_helpline' => 'Ew Helpline',
            'ad_helpline' => 'Ad Helpline',
            'exceptServiceFeeEW' => 'Except Service Fee Ew',
            'exceptServiceFeeAD' => 'Except Service Fee Ad',
            'GRP_CODE' => 'Grp Code',
            'HQ_CODE' => 'Hq Code',
            'CLI_CODE' => 'Cli Code',
            'contact_email' => 'Contact Email',
            'appliancetype_mail' => 'Appliancetype Mail',
            'branchcode' => 'Branchcode',
            'AR_CODE' => 'Ar Code',
            'AP_CODE' => 'Ap Code',
            'billing_type' => 'Billing Type',
            'required_wht' => 'Required Wht',
            'email_contact' => 'Email Contact',
            'allow_auto_mail' => 'Allow Auto Mail',
            'allow_billpayment' => 'Allow Billpayment',
            'sent_fronter_status' => 'Sent Fronter Status',
            'sale_report_saleperson' => 'Sale Report Saleperson',
            'sale_report_keyed_in' => 'Sale Report Keyed In',
            'AR_CODE_OLD' => 'Ar Code Old',
            'currency_code' => 'Currency Code',
        ];
    }
}
