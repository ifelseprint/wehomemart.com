<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation_product_mapping".
 *
 * @property int|null $quotation_id
 * @property int|null $product_id
 */
class QuotationProductMapping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotation_product_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quotation_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'quotation_id' => 'Quotation ID',
            'product_id' => 'Product ID',
        ];
    }
}
