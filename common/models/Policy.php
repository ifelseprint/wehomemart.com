<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "policy".
 *
 * @property int $pol_id
 * @property int|null $contract_contract_id
 * @property int|null $contract_partner_id
 * @property int|null $contract_outlets_id
 * @property int|null $contract_prod_id
 * @property int|null $contract_prod_set
 * @property string|null $pol_service_no
 * @property int $pol_seq
 * @property string|null $pol_date
 * @property int|null $pol_appliance_type
 * @property float|null $pol_price
 * @property string|null $pol_brand
 * @property string|null $pol_brand_id
 * @property string|null $pol_model
 * @property string|null $pol_serial_no
 * @property string|null $pol_terminal_number
 * @property string|null $pol_ticket_number
 * @property string|null $pol_sales
 * @property string|null $pol_manufacturer_start
 * @property string|null $pol_manufacturer_end
 * @property string|null $pol_manufacturer_year
 * @property string|null $pol_extended_start ew service
 * @property string|null $pol_extended_end ew service
 * @property string|null $pol_extended_year ew service
 * @property string|null $pol_status 1=Purchase ,2 Cancel
 * @property int|null $pol_cancel_reason
 * @property int|null $pol_cancel_qut
 * @property string|null $pol_cancel_remark
 * @property float|null $pol_cancel_return_service_fee
 * @property string|null $pol_cancel_date
 * @property int|null $pol_cancel_by
 * @property string|null $is_admin_edit
 * @property string|null $pol_key
 * @property string|null $TaxReceiptNo
 * @property string|null $CreditNoteNo
 * @property string|null $PolExtRefNo
 * @property float|null $VATPercentage
 * @property float|null $WHTPercentage
 * @property float|null $ServiceFeePercentage Service Fee %
 * @property float|null $PremiumFeePercentage
 * @property float|null $DistributionFeePercentage
 * @property float|null $ServiceFeeAmount Service Fee Amount  = ( Service Fee (%) * Appliance Price)
 * @property float|null $MarketingFeePercentage Marketing Fee [%]  รับค่ามาจาก Arrangement Fee 
 * @property float|null $CommissionFeePercentage CommissionFeePercentage = CommissionFeePercentage*
 * @property float|null $PDPercentage
 * @property float|null $EWPercentage
 * @property float|null $RiskSharePercentage
 * @property float|null $FronterRiskSharePercentage
 * @property float|null $MATFeePercentage
 * @property float|null $MATHandlingFeePercentage
 * @property float|null $MATMKTFeePercentage
 * @property float|null $MATMKTITFeePercentage
 * @property float|null $BrokerFeePercentage
 * @property float|null $SalesPersonCommissionPercentage
 * @property float|null $KeyinCommissionPercentage
 * @property float|null $RiskPremiumPercentage
 * @property float|null $FronterWHTPercentage
 * @property int|null $pol_holder_title Policy holders
 * @property string|null $pol_holder_firstname
 * @property string|null $pol_holder_lastname
 * @property string|null $pol_holder_id_card_no
 * @property string|null $pol_holder_house_number
 * @property string|null $pol_holder_address1
 * @property string|null $pol_holder_address2
 * @property string|null $pol_holder_district
 * @property string|null $pol_holder_city
 * @property string|null $pol_holder_province
 * @property string|null $pol_holder_zipcode
 * @property string|null $pol_holder_home_phone
 * @property string|null $pol_holder_fax
 * @property string|null $pol_holder_mobile
 * @property string|null $pol_holder_mobile2
 * @property string|null $pol_holder_email
 * @property int|null $billing_address 0-no billing address; 1-link to billing address
 * @property int|null $upload_id upload to backend
 * @property string|null $upload_date date upload to backend
 * @property string|null $crdate
 * @property int|null $cruser
 * @property string|null $mddate
 * @property int|null $mduser
 * @property string|null $pol_partner_temp old partner code 
 * @property string|null $pol_outlets_temp
 * @property string|null $remark
 * @property string|null $remark_claim
 * @property string|null $activation_code
 * @property string|null $pol_pd_start
 * @property string|null $pol_pd_end
 * @property string|null $pol_pd_year
 * @property string|null $pol_holder_beneficiary
 * @property string|null $pol_sale_name
 * @property string|null $salereport_no
 * @property string|null $salereport_date
 * @property string|null $cashtransfer_no
 * @property string|null $cashtransfer_date
 * @property string|null $invoice_no
 * @property string|null $invoice_date
 * @property string|null $creditnote_no
 * @property string|null $creditnote_date
 * @property string|null $receive_no
 * @property string|null $receive_date
 * @property string|null $f_statement_no
 * @property string|null $f_statement_date
 * @property float|null $discount_amount
 * @property float|null $vat_amount
 * @property float|null $wht_amount
 * @property float|null $premium_ex_vat
 * @property string|null $msc
 * @property string|null $pol_barcode
 * @property string|null $doc_sent_fronter
 * @property string|null $doc_status
 * @property string|null $invoice_completed
 * @property string|null $is_dummy
 * @property string|null $pol_buy_from_shop
 * @property string|null $pol_buy_from_branch
 * @property string|null $pol_tax_receipt_no
 * @property string|null $pol_type 1 : normal policy, 2 : online policy
 * @property string|null $IS_SEND_POLICY_TO_EMAIL
 * @property string|null $IS_SEND_INFORMATION_TO_EMAIL
 * @property string|null $IS_SEND_INFORMATION_TO_ADDRESS
 * @property string|null $SEND_HARD_COPY_TO_ADDRESS
 * @property string|null $FRONTER_STATEMENT_CMONTH_YEAR
 * @property string|null $FRONTER_STATEMENT_CPOL_NO
 * @property string|null $FRONTER_STATEMENT_AS_OF_DATE
 * @property string|null $FRONTER_STATEMENT_CREATED
 */
class Policy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pol_id', 'pol_seq',], 'required'],
            [['pol_id', 'contract_contract_id', 'contract_partner_id', 'contract_outlets_id', 'contract_prod_id', 'contract_prod_set', 'pol_seq', 'pol_appliance_type', 'pol_cancel_reason', 'pol_cancel_qut', 'pol_cancel_by', 'pol_holder_title', 'billing_address', 'upload_id', 'cruser', 'mduser'], 'integer'],
            [['pol_date', 'pol_manufacturer_start', 'pol_manufacturer_end', 'pol_extended_start', 'pol_extended_end', 'pol_cancel_date', 'upload_date', 'crdate', 'mddate', 'pol_pd_start', 'pol_pd_end', 'salereport_date', 'cashtransfer_date', 'invoice_date', 'creditnote_date', 'receive_date', 'f_statement_date', 'FRONTER_STATEMENT_AS_OF_DATE', 'FRONTER_STATEMENT_CREATED'], 'safe'],
            [['pol_price', 'pol_cancel_return_service_fee', 'VATPercentage', 'WHTPercentage', 'ServiceFeePercentage', 'PremiumFeePercentage', 'DistributionFeePercentage', 'ServiceFeeAmount', 'MarketingFeePercentage', 'CommissionFeePercentage', 'PDPercentage', 'EWPercentage', 'RiskSharePercentage', 'FronterRiskSharePercentage', 'MATFeePercentage', 'MATHandlingFeePercentage', 'MATMKTFeePercentage', 'MATMKTITFeePercentage', 'BrokerFeePercentage', 'SalesPersonCommissionPercentage', 'KeyinCommissionPercentage', 'RiskPremiumPercentage', 'FronterWHTPercentage', 'discount_amount', 'vat_amount', 'wht_amount', 'premium_ex_vat'], 'number'],
            [['pol_cancel_remark', 'remark', 'remark_claim', 'invoice_completed', 'is_dummy', 'pol_type', 'IS_SEND_POLICY_TO_EMAIL', 'SEND_HARD_COPY_TO_ADDRESS'], 'string'],
            [['pol_service_no', 'pol_sales', 'pol_key', 'PolExtRefNo', 'pol_holder_fax', 'pol_holder_mobile2'], 'string', 'max' => 20],
            [['pol_brand', 'pol_brand_id', 'pol_terminal_number', 'pol_holder_house_number', 'pol_holder_home_phone', 'pol_holder_mobile', 'salereport_no', 'cashtransfer_no', 'invoice_no', 'creditnote_no', 'receive_no', 'doc_sent_fronter'], 'string', 'max' => 50],
            [['pol_model', 'pol_serial_no', 'pol_ticket_number', 'pol_holder_firstname', 'pol_holder_lastname', 'pol_holder_district', 'pol_holder_city', 'pol_holder_email', 'activation_code', 'f_statement_no', 'pol_tax_receipt_no'], 'string', 'max' => 100],
            [['pol_manufacturer_year', 'pol_extended_year', 'pol_pd_year'], 'string', 'max' => 11],
            [['pol_status', 'is_admin_edit', 'doc_status', 'IS_SEND_INFORMATION_TO_EMAIL', 'IS_SEND_INFORMATION_TO_ADDRESS'], 'string', 'max' => 1],
            [['TaxReceiptNo', 'CreditNoteNo'], 'string', 'max' => 18],
            [['pol_holder_id_card_no'], 'string', 'max' => 30],
            [['pol_holder_address1', 'pol_holder_address2', 'pol_buy_from_shop', 'pol_buy_from_branch'], 'string', 'max' => 200],
            [['pol_holder_province'], 'string', 'max' => 3],
            [['pol_holder_zipcode', 'FRONTER_STATEMENT_CMONTH_YEAR'], 'string', 'max' => 6],
            [['pol_partner_temp', 'pol_outlets_temp', 'pol_barcode'], 'string', 'max' => 255],
            [['pol_holder_beneficiary', 'pol_sale_name'], 'string', 'max' => 250],
            [['msc', 'FRONTER_STATEMENT_CPOL_NO'], 'string', 'max' => 10],
            [['pol_id', 'pol_seq'], 'unique', 'targetAttribute' => ['pol_id', 'pol_seq']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pol_id' => 'Pol ID',
            'contract_contract_id' => 'Contract Contract ID',
            'contract_partner_id' => 'Contract Partner ID',
            'contract_outlets_id' => 'Contract Outlets ID',
            'contract_prod_id' => 'Contract Prod ID',
            'contract_prod_set' => 'Contract Prod Set',
            'pol_service_no' => 'Pol Service No',
            'pol_seq' => 'Pol Seq',
            'pol_date' => 'Pol Date',
            'pol_appliance_type' => 'Pol Appliance Type',
            'pol_price' => 'Pol Price',
            'pol_brand' => 'Pol Brand',
            'pol_brand_id' => 'Pol Brand ID',
            'pol_model' => 'Pol Model',
            'pol_serial_no' => 'Pol Serial No',
            'pol_terminal_number' => 'Pol Terminal Number',
            'pol_ticket_number' => 'Pol Ticket Number',
            'pol_sales' => 'Pol Sales',
            'pol_manufacturer_start' => 'Pol Manufacturer Start',
            'pol_manufacturer_end' => 'Pol Manufacturer End',
            'pol_manufacturer_year' => 'Pol Manufacturer Year',
            'pol_extended_start' => 'Pol Extended Start',
            'pol_extended_end' => 'Pol Extended End',
            'pol_extended_year' => 'Pol Extended Year',
            'pol_status' => 'Pol Status',
            'pol_cancel_reason' => 'Pol Cancel Reason',
            'pol_cancel_qut' => 'Pol Cancel Qut',
            'pol_cancel_remark' => 'Pol Cancel Remark',
            'pol_cancel_return_service_fee' => 'Pol Cancel Return Service Fee',
            'pol_cancel_date' => 'Pol Cancel Date',
            'pol_cancel_by' => 'Pol Cancel By',
            'is_admin_edit' => 'Is Admin Edit',
            'pol_key' => 'Pol Key',
            'TaxReceiptNo' => 'Tax Receipt No',
            'CreditNoteNo' => 'Credit Note No',
            'PolExtRefNo' => 'Pol Ext Ref No',
            'VATPercentage' => 'Vat Percentage',
            'WHTPercentage' => 'Wht Percentage',
            'ServiceFeePercentage' => 'Service Fee Percentage',
            'PremiumFeePercentage' => 'Premium Fee Percentage',
            'DistributionFeePercentage' => 'Distribution Fee Percentage',
            'ServiceFeeAmount' => 'Service Fee Amount',
            'MarketingFeePercentage' => 'Marketing Fee Percentage',
            'CommissionFeePercentage' => 'Commission Fee Percentage',
            'PDPercentage' => 'Pd Percentage',
            'EWPercentage' => 'Ew Percentage',
            'RiskSharePercentage' => 'Risk Share Percentage',
            'FronterRiskSharePercentage' => 'Fronter Risk Share Percentage',
            'MATFeePercentage' => 'Mat Fee Percentage',
            'MATHandlingFeePercentage' => 'Mat Handling Fee Percentage',
            'MATMKTFeePercentage' => 'Matmkt Fee Percentage',
            'MATMKTITFeePercentage' => 'Matmktit Fee Percentage',
            'BrokerFeePercentage' => 'Broker Fee Percentage',
            'SalesPersonCommissionPercentage' => 'Sales Person Commission Percentage',
            'KeyinCommissionPercentage' => 'Keyin Commission Percentage',
            'RiskPremiumPercentage' => 'Risk Premium Percentage',
            'FronterWHTPercentage' => 'Fronter Wht Percentage',
            'pol_holder_title' => 'Pol Holder Title',
            'pol_holder_firstname' => 'Pol Holder Firstname',
            'pol_holder_lastname' => 'Pol Holder Lastname',
            'pol_holder_id_card_no' => 'Pol Holder Id Card No',
            'pol_holder_house_number' => 'Pol Holder House Number',
            'pol_holder_address1' => 'Pol Holder Address1',
            'pol_holder_address2' => 'Pol Holder Address2',
            'pol_holder_district' => 'Pol Holder District',
            'pol_holder_city' => 'Pol Holder City',
            'pol_holder_province' => 'Pol Holder Province',
            'pol_holder_zipcode' => 'Pol Holder Zipcode',
            'pol_holder_home_phone' => 'Pol Holder Home Phone',
            'pol_holder_fax' => 'Pol Holder Fax',
            'pol_holder_mobile' => 'Pol Holder Mobile',
            'pol_holder_mobile2' => 'Pol Holder Mobile2',
            'pol_holder_email' => 'Pol Holder Email',
            'billing_address' => 'Billing Address',
            'upload_id' => 'Upload ID',
            'upload_date' => 'Upload Date',
            'crdate' => 'Crdate',
            'cruser' => 'Cruser',
            'mddate' => 'Mddate',
            'mduser' => 'Mduser',
            'pol_partner_temp' => 'Pol Partner Temp',
            'pol_outlets_temp' => 'Pol Outlets Temp',
            'remark' => 'Remark',
            'remark_claim' => 'Remark Claim',
            'activation_code' => 'Activation Code',
            'pol_pd_start' => 'Pol Pd Start',
            'pol_pd_end' => 'Pol Pd End',
            'pol_pd_year' => 'Pol Pd Year',
            'pol_holder_beneficiary' => 'Pol Holder Beneficiary',
            'pol_sale_name' => 'Pol Sale Name',
            'salereport_no' => 'Salereport No',
            'salereport_date' => 'Salereport Date',
            'cashtransfer_no' => 'Cashtransfer No',
            'cashtransfer_date' => 'Cashtransfer Date',
            'invoice_no' => 'Invoice No',
            'invoice_date' => 'Invoice Date',
            'creditnote_no' => 'Creditnote No',
            'creditnote_date' => 'Creditnote Date',
            'receive_no' => 'Receive No',
            'receive_date' => 'Receive Date',
            'f_statement_no' => 'F Statement No',
            'f_statement_date' => 'F Statement Date',
            'discount_amount' => 'Discount Amount',
            'vat_amount' => 'Vat Amount',
            'wht_amount' => 'Wht Amount',
            'premium_ex_vat' => 'Premium Ex Vat',
            'msc' => 'Msc',
            'pol_barcode' => 'Pol Barcode',
            'doc_sent_fronter' => 'Doc Sent Fronter',
            'doc_status' => 'Doc Status',
            'invoice_completed' => 'Invoice Completed',
            'is_dummy' => 'Is Dummy',
            'pol_buy_from_shop' => 'Pol Buy From Shop',
            'pol_buy_from_branch' => 'Pol Buy From Branch',
            'pol_tax_receipt_no' => 'Pol Tax Receipt No',
            'pol_type' => 'Pol Type',
            'IS_SEND_POLICY_TO_EMAIL' => 'Is Send Policy To Email',
            'IS_SEND_INFORMATION_TO_EMAIL' => 'Is Send Information To Email',
            'IS_SEND_INFORMATION_TO_ADDRESS' => 'Is Send Information To Address',
            'SEND_HARD_COPY_TO_ADDRESS' => 'Send Hard Copy To Address',
            'FRONTER_STATEMENT_CMONTH_YEAR' => 'Fronter Statement Cmonth Year',
            'FRONTER_STATEMENT_CPOL_NO' => 'Fronter Statement Cpol No',
            'FRONTER_STATEMENT_AS_OF_DATE' => 'Fronter Statement As Of Date',
            'FRONTER_STATEMENT_CREATED' => 'Fronter Statement Created',
        ];
    }
}
