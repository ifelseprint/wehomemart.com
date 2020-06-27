<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract_header".
 *
 * @property int $contract_id
 * @property string|null $contract_name
 * @property int $partner_id
 * @property int $prod_id
 * @property int $prod_set
 * @property int|null $fronter
 * @property string|null $contract_no ห้ามใช้เกิน 20 เนื่องจากเข้าระบบ NACs ไม่ได้
 * @property string|null $startdate
 * @property string|null $enddate
 * @property float|null $MarketingFeePercentage  Arrangement Fee 
 * @property float|null $CommissionFeePercentage  Arrangement Fee 
 * @property float|null $TaxStampPercentage  Arrangement Fee 
 * @property float|null $VATPercentage  Arrangement Fee 
 * @property float|null $WHTPercentage  Arrangement Fee 
 * @property float|null $PremiumFeePercentage  Arrangement Fee 
 * @property float|null $DistributionFeePercentage  Arrangement Fee 
 * @property float|null $SalesPersonCommissionPercentage  Arrangement Fee 
 * @property float|null $KeyinCommissionPercentage  Arrangement Fee 
 * @property string|null $is_active Y/N/D-->delete/T-->test
 * @property string|null $crdate
 * @property int|null $cruser
 * @property string|null $mddate
 * @property int|null $mduser
 * @property int|null $is_child -Used of Adv for Finish package. -I change Dtac not is child policy (now) - in the future maybe
 * @property int|null $contract_master_id
 * @property string|null $DistributionFee_Baseon
 * @property string|null $is_mapproduct_nacs
 * @property int|null $package_id
 * @property string|null $display_btn_class
 * @property int|null $display_order
 * @property string|null $status
 * @property string $auto_invoice
 * @property float $discount_rate
 */
class ContractHeader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract_header';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partner_id', 'prod_id', 'prod_set'], 'required'],
            [['partner_id', 'prod_id', 'prod_set', 'fronter', 'cruser', 'mduser', 'is_child', 'contract_master_id', 'package_id', 'display_order'], 'integer'],
            [['startdate', 'enddate', 'crdate', 'mddate'], 'safe'],
            [['MarketingFeePercentage', 'CommissionFeePercentage', 'TaxStampPercentage', 'VATPercentage', 'WHTPercentage', 'PremiumFeePercentage', 'DistributionFeePercentage', 'SalesPersonCommissionPercentage', 'KeyinCommissionPercentage', 'discount_rate'], 'number'],
            [['status', 'auto_invoice'], 'string'],
            [['contract_name', 'display_btn_class'], 'string', 'max' => 50],
            [['contract_no'], 'string', 'max' => 20],
            [['is_active', 'is_mapproduct_nacs'], 'string', 'max' => 1],
            [['DistributionFee_Baseon'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contract_id' => 'Contract ID',
            'contract_name' => 'Contract Name',
            'partner_id' => 'Partner ID',
            'prod_id' => 'Prod ID',
            'prod_set' => 'Prod Set',
            'fronter' => 'Fronter',
            'contract_no' => 'Contract No',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'MarketingFeePercentage' => 'Marketing Fee Percentage',
            'CommissionFeePercentage' => 'Commission Fee Percentage',
            'TaxStampPercentage' => 'Tax Stamp Percentage',
            'VATPercentage' => 'Vat Percentage',
            'WHTPercentage' => 'Wht Percentage',
            'PremiumFeePercentage' => 'Premium Fee Percentage',
            'DistributionFeePercentage' => 'Distribution Fee Percentage',
            'SalesPersonCommissionPercentage' => 'Sales Person Commission Percentage',
            'KeyinCommissionPercentage' => 'Keyin Commission Percentage',
            'is_active' => 'Is Active',
            'crdate' => 'Crdate',
            'cruser' => 'Cruser',
            'mddate' => 'Mddate',
            'mduser' => 'Mduser',
            'is_child' => 'Is Child',
            'contract_master_id' => 'Contract Master ID',
            'DistributionFee_Baseon' => 'Distribution Fee Baseon',
            'is_mapproduct_nacs' => 'Is Mapproduct Nacs',
            'package_id' => 'Package ID',
            'display_btn_class' => 'Display Btn Class',
            'display_order' => 'Display Order',
            'status' => 'Status',
            'auto_invoice' => 'Auto Invoice',
            'discount_rate' => 'Discount Rate',
        ];
    }
}
