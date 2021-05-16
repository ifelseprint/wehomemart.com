<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property int $quotation_id
 * @property int|null $quotation_type 1 = นิติบุคคล, 2 = บริษัท
 * @property string|null $quotation_code
 * @property string|null $quotation_firstname
 * @property string|null $quotation_lastname
 * @property string|null $quotation_email
 * @property string|null $quotation_telephone
 * @property string|null $quotation_company
 * @property string|null $quotation_tax_id
 * @property string|null $quotation_address
 * @property string|null $quotation_building
 * @property string|null $quotation_moo
 * @property string|null $quotation_district
 * @property string|null $quotation_amphur
 * @property string|null $quotation_province
 * @property int|null $quotation_postal_code
 * @property int|null $quotation_project_category_id
 * @property string|null $quotation_product_file
 * @property string|null $quotation_product_file_path
 * @property int|null $quotation_delivery_type
 * @property string|null $quotation_delivery_tax_address
 * @property string|null $quotation_delivery_tax_building
 * @property string|null $quotation_delivery_tax_moo
 * @property string|null $quotation_delivery_tax_district
 * @property string|null $quotation_delivery_tax_amphur
 * @property string|null $quotation_delivery_tax_province
 * @property int|null $quotation_delivery_tax_postal_code
 * @property string|null $quotation_delivery_other_firstname
 * @property string|null $quotation_delivery_other_lastname
 * @property string|null $quotation_delivery_other_telephone
 * @property string|null $quotation_delivery_other_address
 * @property string|null $quotation_delivery_other_building
 * @property string|null $quotation_delivery_other_moo
 * @property string|null $quotation_delivery_other_district
 * @property string|null $quotation_delivery_other_amphur
 * @property string|null $quotation_delivery_other_province
 * @property int|null $quotation_delivery_other_postal_code
 * @property string|null $quotation_delivery_other_note
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quotation_type', 'quotation_postal_code', 'quotation_project_category_id', 'quotation_delivery_type', 'quotation_delivery_tax_postal_code', 'quotation_delivery_other_postal_code', 'created_user', 'modified_user'], 'integer'],
            [['quotation_delivery_other_note'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['quotation_code', 'quotation_building', 'quotation_moo', 'quotation_district', 'quotation_amphur', 'quotation_province', 'quotation_delivery_tax_building', 'quotation_delivery_tax_moo', 'quotation_delivery_tax_district', 'quotation_delivery_tax_amphur', 'quotation_delivery_tax_province', 'quotation_delivery_other_building', 'quotation_delivery_other_moo', 'quotation_delivery_other_district', 'quotation_delivery_other_amphur', 'quotation_delivery_other_province'], 'string', 'max' => 100],
            [['quotation_firstname', 'quotation_lastname', 'quotation_email', 'quotation_delivery_other_firstname', 'quotation_delivery_other_lastname'], 'string', 'max' => 150],
            [['quotation_telephone', 'quotation_tax_id', 'quotation_delivery_other_telephone'], 'string', 'max' => 20],
            [['quotation_company', 'quotation_address', 'quotation_delivery_tax_address', 'quotation_delivery_other_address'], 'string', 'max' => 255],
            [['quotation_product_file'], 'string', 'max' => 200],
            [['quotation_product_file_path'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'quotation_id' => 'Quotation ID',
            'quotation_type' => 'Quotation Type',
            'quotation_code' => 'Quotation Code',
            'quotation_firstname' => 'Quotation Firstname',
            'quotation_lastname' => 'Quotation Lastname',
            'quotation_email' => 'Quotation Email',
            'quotation_telephone' => 'Quotation Telephone',
            'quotation_company' => 'Quotation Company',
            'quotation_tax_id' => 'Quotation Tax ID',
            'quotation_address' => 'Quotation Address',
            'quotation_building' => 'Quotation Building',
            'quotation_moo' => 'Quotation Moo',
            'quotation_district' => 'Quotation District',
            'quotation_amphur' => 'Quotation Amphur',
            'quotation_province' => 'Quotation Province',
            'quotation_postal_code' => 'Quotation Postal Code',
            'quotation_project_category_id' => 'Quotation Project Category ID',
            'quotation_product_file' => 'Quotation Product File',
            'quotation_product_file_path' => 'Quotation Product File Path',
            'quotation_delivery_type' => 'Quotation Delivery Type',
            'quotation_delivery_tax_address' => 'Quotation Delivery Tax Address',
            'quotation_delivery_tax_building' => 'Quotation Delivery Tax Building',
            'quotation_delivery_tax_moo' => 'Quotation Delivery Tax Moo',
            'quotation_delivery_tax_district' => 'Quotation Delivery Tax District',
            'quotation_delivery_tax_amphur' => 'Quotation Delivery Tax Amphur',
            'quotation_delivery_tax_province' => 'Quotation Delivery Tax Province',
            'quotation_delivery_tax_postal_code' => 'Quotation Delivery Tax Postal Code',
            'quotation_delivery_other_firstname' => 'Quotation Delivery Other Firstname',
            'quotation_delivery_other_lastname' => 'Quotation Delivery Other Lastname',
            'quotation_delivery_other_telephone' => 'Quotation Delivery Other Telephone',
            'quotation_delivery_other_address' => 'Quotation Delivery Other Address',
            'quotation_delivery_other_building' => 'Quotation Delivery Other Building',
            'quotation_delivery_other_moo' => 'Quotation Delivery Other Moo',
            'quotation_delivery_other_district' => 'Quotation Delivery Other District',
            'quotation_delivery_other_amphur' => 'Quotation Delivery Other Amphur',
            'quotation_delivery_other_province' => 'Quotation Delivery Other Province',
            'quotation_delivery_other_postal_code' => 'Quotation Delivery Other Postal Code',
            'quotation_delivery_other_note' => 'Quotation Delivery Other Note',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
        ];
    }
}
