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
 * @property int|null $quotation_telephone
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
 * @property string|null $quotation_product_name
 * @property string|null $quotation_product_image
 * @property string|null $quotation_product_image_path
 * @property int|null $quotation_product_amount
 * @property string|null $quotation_delivery_firstname
 * @property string|null $quotation_delivery_lastname
 * @property int|null $quotation_delivery_telephone
 * @property string|null $quotation_delivery_address
 * @property string|null $quotation_delivery_building
 * @property string|null $quotation_delivery_moo
 * @property string|null $quotation_delivery_district
 * @property string|null $quotation_delivery_amphur
 * @property string|null $quotation_delivery_province
 * @property int|null $quotation_delivery_postal_code
 * @property string|null $quotation_delivery_note
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
            [['quotation_type', 'quotation_telephone', 'quotation_postal_code', 'quotation_project_category_id', 'quotation_product_amount', 'quotation_delivery_telephone', 'quotation_delivery_postal_code', 'created_user', 'modified_user'], 'integer'],
            [['quotation_delivery_note'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['quotation_code', 'quotation_building', 'quotation_moo', 'quotation_district', 'quotation_amphur', 'quotation_province', 'quotation_delivery_building', 'quotation_delivery_moo', 'quotation_delivery_district', 'quotation_delivery_amphur', 'quotation_delivery_province'], 'string', 'max' => 100],
            [['quotation_firstname', 'quotation_lastname', 'quotation_email', 'quotation_delivery_firstname', 'quotation_delivery_lastname'], 'string', 'max' => 150],
            [['quotation_company', 'quotation_address', 'quotation_product_name', 'quotation_delivery_address'], 'string', 'max' => 255],
            [['quotation_tax_id'], 'string', 'max' => 20],
            [['quotation_product_image'], 'string', 'max' => 200],
            [['quotation_product_image_path'], 'string', 'max' => 10],
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
            'quotation_product_name' => 'Quotation Product Name',
            'quotation_product_image' => 'Quotation Product Image',
            'quotation_product_image_path' => 'Quotation Product Image Path',
            'quotation_product_amount' => 'Quotation Product Amount',
            'quotation_delivery_firstname' => 'Quotation Delivery Firstname',
            'quotation_delivery_lastname' => 'Quotation Delivery Lastname',
            'quotation_delivery_telephone' => 'Quotation Delivery Telephone',
            'quotation_delivery_address' => 'Quotation Delivery Address',
            'quotation_delivery_building' => 'Quotation Delivery Building',
            'quotation_delivery_moo' => 'Quotation Delivery Moo',
            'quotation_delivery_district' => 'Quotation Delivery District',
            'quotation_delivery_amphur' => 'Quotation Delivery Amphur',
            'quotation_delivery_province' => 'Quotation Delivery Province',
            'quotation_delivery_postal_code' => 'Quotation Delivery Postal Code',
            'quotation_delivery_note' => 'Quotation Delivery Note',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
        ];
    }
}
