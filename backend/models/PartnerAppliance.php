<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class PartnerAppliance extends \common\models\PartnerAppliance
{

    public function getApplianceType()
    {
        return $this->hasOne(\common\models\ApplianceType::className(), ['appliance_type_id' => 'appliance_type_id']);
    }

}
