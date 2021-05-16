<?php

namespace frontend\models;

use Yii;

class Quotation extends \common\models\Quotation
{
    public $quotation_product;
    public $quotation_product_name;
    public $quotation_product_amount;
    public $quotation_product_unit;
    public $quotation_product_image;
    public $quotation_product_image_1;
    public $quotation_product_image_2;
    public $quotation_product_image_3;
    public $quotation_product_image_4;
    public $quotation_product_image_5;
    public $quotation_product_image_6;
    public $quotation_product_image_7;
    public $quotation_product_image_8;
    public $quotation_product_image_9;
    public $quotation_product_image_10;
    public $quotation_product_image_11;
    public $quotation_product_image_12;
    public $quotation_product_image_13;
    public $quotation_product_image_14;
    public $quotation_product_image_15;
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['quotation_product','quotation_product_name','quotation_product_amount','quotation_product_unit'], 'safe'],
            [['quotation_product_file','quotation_product_image_1','quotation_product_image_2','quotation_product_image_3','quotation_product_image_4','quotation_product_image_5','quotation_product_image_6','quotation_product_image_7','quotation_product_image_8','quotation_product_image_9','quotation_product_image_10','quotation_product_image_11','quotation_product_image_12','quotation_product_image_13','quotation_product_image_14','quotation_product_image_15'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ]);
    }
    public function attributeLabels(){
        return array_merge(parent::attributeLabels(), [
            'quotation_type' => Yii::t('app', 'txt_type_registration'),
            'quotation_code' => Yii::t('app', 'quotation_code'),
            'quotation_firstname' => Yii::t('app', 'firstname'),
            'quotation_lastname' => Yii::t('app', 'lastname'),
            'quotation_email' => Yii::t('app', 'email'),
            'quotation_telephone' => Yii::t('app', 'telephone'),
            'quotation_company' => Yii::t('app', 'company'),
            'quotation_tax_id' => Yii::t('app', 'tax_id'),
            'quotation_address' => Yii::t('app', 'address'),
            'quotation_building' => Yii::t('app', 'building'),
            'quotation_moo' => Yii::t('app', 'moo'),
            'quotation_district' => Yii::t('app', 'district'),
            'quotation_amphur' => Yii::t('app', 'amphur'),
            'quotation_province' => Yii::t('app', 'province'),
            'quotation_postal_code' => Yii::t('app', 'postal_code'),
            'quotation_project_category_id' => Yii::t('app', 'category'),
            'quotation_product_name' => Yii::t('app', 'product_name'),
            'quotation_product_image' => Yii::t('app', 'product_image'),
            'quotation_product_amount' => Yii::t('app', 'amount'),
            'quotation_product_unit' => Yii::t('app', 'unit'),
            'quotation_delivery_firstname' => Yii::t('app', 'firstname'),
            'quotation_delivery_lastname' => Yii::t('app', 'lastname'),
            'quotation_delivery_telephone' => Yii::t('app', 'telephone'),
            'quotation_delivery_address' => Yii::t('app', 'address'),
            'quotation_delivery_building' => Yii::t('app', 'building'),
            'quotation_delivery_moo' => Yii::t('app', 'moo'),
            'quotation_delivery_district' => Yii::t('app', 'district'),
            'quotation_delivery_amphur' => Yii::t('app', 'amphur'),
            'quotation_delivery_province' => Yii::t('app', 'province'),
            'quotation_delivery_postal_code' => Yii::t('app', 'postal_code'),
            'quotation_delivery_other_note' =>  Yii::t('app', 'note'),
        ]);
    }
}
