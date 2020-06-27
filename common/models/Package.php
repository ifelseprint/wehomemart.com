<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property int $id
 * @property int $prod_set_id
 * @property int|null $fronter_id
 * @property string|null $name
 * @property float|null $price_range
 * @property float|null $price_range_to
 * @property string|null $contact_email
 * @property int|null $package_fronter_id
 * @property string|null $mit_package
 * @property int|null $package_group
 * @property string $is_active
 * @property string $is_price 0 = hide, 1 = show
 * @property string $create_date
 * @property string|null $modify_date
 * @property float|null $vat_rate
 * @property float|null $wht_rate
 * @property float|null $stamp_rate
 * @property float|null $brokerage_rate
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_set_id', 'create_date'], 'required'],
            [['prod_set_id', 'fronter_id', 'package_fronter_id', 'package_group'], 'integer'],
            [['price_range', 'price_range_to', 'vat_rate', 'wht_rate', 'stamp_rate', 'brokerage_rate'], 'number'],
            [['is_active', 'is_price'], 'string'],
            [['create_date', 'modify_date'], 'safe'],
            [['name', 'contact_email'], 'string', 'max' => 100],
            [['mit_package'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_set_id' => 'Prod Set ID',
            'fronter_id' => 'Fronter ID',
            'name' => 'Name',
            'price_range' => 'Price Range',
            'price_range_to' => 'Price Range To',
            'contact_email' => 'Contact Email',
            'package_fronter_id' => 'Package Fronter ID',
            'mit_package' => 'Mit Package',
            'package_group' => 'Package Group',
            'is_active' => 'Is Active',
            'is_price' => 'Is Price',
            'create_date' => 'Create Date',
            'modify_date' => 'Modify Date',
            'vat_rate' => 'Vat Rate',
            'wht_rate' => 'Wht Rate',
            'stamp_rate' => 'Stamp Rate',
            'brokerage_rate' => 'Brokerage Rate',
        ];
    }
}
