<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation_product_image_mapping".
 *
 * @property int|null $quotation_id
 * @property string|null $quotation_product_name
 * @property string|null $quotation_product_image
 * @property string|null $quotation_product_image_path
 * @property string|null $quotation_product_unit
 * @property int|null $quotation_product_amount
 */
class QuotationProductImageMapping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotation_product_image_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quotation_id', 'quotation_product_amount'], 'integer'],
            [['quotation_product_name'], 'string', 'max' => 255],
            [['quotation_product_image'], 'string', 'max' => 200],
            [['quotation_product_image_path'], 'string', 'max' => 10],
            [['quotation_product_unit'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'quotation_id' => 'Quotation ID',
            'quotation_product_name' => 'Quotation Product Name',
            'quotation_product_image' => 'Quotation Product Image',
            'quotation_product_image_path' => 'Quotation Product Image Path',
            'quotation_product_unit' => 'Quotation Product Unit',
            'quotation_product_amount' => 'Quotation Product Amount',
        ];
    }
}
