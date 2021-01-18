<?php

namespace frontend\models;

use Yii;

class Quotation extends \common\models\Quotation
{
    public $quotation_product;
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['quotation_product'], 'safe'],
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
            'quotation_delivery_note' =>  Yii::t('app', 'note'),
        ]);
    }
}
