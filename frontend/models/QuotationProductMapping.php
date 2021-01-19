<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

class QuotationProductMapping extends \common\models\QuotationProductMapping
{

    public function getProduct()
    {
        return $this->hasOne(\common\models\Product::className(), ['product_id' => 'product_id']);
    }
}
