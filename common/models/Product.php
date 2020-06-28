<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $product_id
 * @property string|null $product_name_th
 * @property string|null $product_name_en
 * @property string|null $product_icon
 * @property string|null $product_image
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 *
 * @property ProductDetail[] $productDetails
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_user', 'modified_user'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['product_name_th', 'product_name_en'], 'string', 'max' => 100],
            [['product_icon', 'product_image'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name_th' => 'Product Name Th',
            'product_name_en' => 'Product Name En',
            'product_icon' => 'Product Icon',
            'product_image' => 'Product Image',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
        ];
    }

    /**
     * Gets query for [[ProductDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetails()
    {
        return $this->hasMany(ProductDetail::className(), ['product_id' => 'product_id']);
    }
}
