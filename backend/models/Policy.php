<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class Policy extends \common\models\Policy
{
    public function attributeLabels()
    {
        return [
            'pol_service_no' => 'หมายเลขใบรับรอง',
            'pol_holder_firstname' => 'ชื่อ',
            'pol_holder_lastname' => 'นามสกุล',
            'contract_partner_id' => 'ผู้ร่วมหุ้น',
            'pol_brand' => 'ยี่ห้อ',
            'pol_appliance_type' => 'ประเภทอุปกรณ์',
        ];
    }
    
    public function getApplianceType()
    {
        return $this->hasOne(\common\models\ApplianceType::className(), ['appliance_type_id' => 'pol_appliance_type']);
    }
    public function getBrand()
    {
        return $this->hasOne(\common\models\Brand::className(), ['brand_id' => 'pol_brand']);
    }

    public function getPartner()
    {
        return $this->hasOne(\common\models\Partner::className(), ['partner_id' => 'contract_partner_id']);
    }

    public function search($params)
    {
        $query = Policy::find()->orderBy(['pol_id' => SORT_DESC]);
        $query->joinWith(['brand','applianceType']);

        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'defaultPageSize' => 20,
            ],
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['brand'] = [
            'asc' => ['brand.brand_name' => SORT_ASC],
            'desc' => ['brand.brand_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['applianceType'] = [
            'asc' => ['appliance_type.appliance_type_name' => SORT_ASC],
            'desc' => ['appliance_type.appliance_type_name' => SORT_DESC],
        ];


        if (!($this->load($params))) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'pol_service_no', $this->pol_service_no]);
        $query->andFilterWhere(['like', 'pol_model', $this->pol_model]);
        $query->andFilterWhere(['like', 'pol_holder_firstname', $this->pol_holder_firstname]);
        $query->andFilterWhere(['like', 'pol_holder_lastname', $this->pol_holder_lastname]);
        $query->andFilterWhere(['=', 'pol_status', $this->pol_status]);
        $query->andFilterWhere(['=', 'contract_partner_id', $this->contract_partner_id]);
        $query->andFilterWhere(['=', 'pol_brand', $this->pol_brand]);
        $query->andFilterWhere(['=', 'pol_appliance_type', $this->pol_appliance_type]);
        return $dataProvider;
    }

}
