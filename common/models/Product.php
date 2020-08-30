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
 * @property string|null $product_icon_path
 * @property string|null $product_image
 * @property string|null $product_image_path
 * @property string|null $product_image_hover
 * @property string|null $product_image_hover_path
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property string|null $meta_tag_title_th
 * @property string|null $meta_tag_title_en
 * @property string|null $meta_tag_description_th
 * @property string|null $meta_tag_description_en
 * @property string|null $meta_tag_keywords_th
 * @property string|null $meta_tag_keywords_en
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
            [['meta_tag_title_th', 'meta_tag_title_en', 'meta_tag_description_th', 'meta_tag_description_en', 'meta_tag_keywords_th', 'meta_tag_keywords_en'], 'string'],
            [['product_name_th', 'product_name_en', 'product_icon_path', 'product_image_path', 'product_image_hover_path'], 'string', 'max' => 100],
            [['product_icon', 'product_image', 'product_image_hover'], 'string', 'max' => 50],
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
            'product_icon_path' => 'Product Icon Path',
            'product_image' => 'Product Image',
            'product_image_path' => 'Product Image Path',
            'product_image_hover' => 'Product Image Hover',
            'product_image_hover_path' => 'Product Image Hover Path',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'meta_tag_title_th' => 'Meta Tag Title Th',
            'meta_tag_title_en' => 'Meta Tag Title En',
            'meta_tag_description_th' => 'Meta Tag Description Th',
            'meta_tag_description_en' => 'Meta Tag Description En',
            'meta_tag_keywords_th' => 'Meta Tag Keywords Th',
            'meta_tag_keywords_en' => 'Meta Tag Keywords En',
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
