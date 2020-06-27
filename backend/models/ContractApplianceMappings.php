<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class ContractApplianceMappings extends \common\models\ContractApplianceMappings
{

    public function getPackage()
    {
        return $this->hasOne(\common\models\Package::className(), ['id' => 'package_id']);
    }


}
