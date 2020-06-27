<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class ContractDetail extends \common\models\ContractDetail
{

    public function getOutlets()
    {
        return $this->hasOne(\common\models\Outlets::className(), ['outlets_id' => 'outlets_id']);
    }

}
