<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_detail".
 *
 * @property int $product_detail_id
 * @property int $product_id
 * @property string|null $product_detail_content_th
 * @property string|null $product_detail_content_en
 * @property string|null $product_detail_image
 * @property string|null $product_detail_image_path
 *
 * @property Product $product
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['product_detail_content_th', 'product_detail_content_en'], 'string'],
            [['product_detail_image'], 'string', 'max' => 50],
            [['product_detail_image_path'], 'string', 'max' => 100],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_detail_id' => 'Product Detail ID',
            'product_id' => 'Product ID',
            'product_detail_content_th' => 'Product Detail Content Th',
            'product_detail_content_en' => 'Product Detail Content En',
            'product_detail_image' => 'Product Detail Image',
            'product_detail_image_path' => 'Product Detail Image Path',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
