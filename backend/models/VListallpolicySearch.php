<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class VListallpolicySearch extends \common\models\VListallpolicySearch
{
    public $pageSize = 25;
    public $pol_date_range;

    public function attributeLabels()
    {
        return [
            'pol_service_no' => 'หมายเลขใบรับรอง',
            'pol_holder_name' => 'ชื่อ-นามสกุล',
            'contract_contract_id' => 'แผนการขาย',
            'contract_partner_id' => 'ผู้ร่วมหุ้น',
            'contract_outlets_id' => 'สาขา',
            'pol_brand' => 'ยี่ห้อ',
            'pol_appliance_type' => 'ประเภทอุปกรณ์',
            'package_id' => 'แพ๊คเกจ',
            'pol_serial_no' => 'เลขสินค้า',
            'pol_ticket_number' => 'เลขใบกำกับภาษี',
            'pol_status' => 'สถานะกรมธรรม์',
            'pageSize' => 'แสดงต่อหน้า',
            'pol_date_range' => 'วันที่ซื้อกรมธรรม์',
        ];
    }
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['pageSize'], 'integer'],
            [['pol_date_range'], 'string'],
        ]);
    }

    public function search($params)
    {

        $query = VListallpolicySearch::find();

        // set data default this year
        if(empty($params) && empty($params['sort'])){
            $query->andFilterWhere(['between', 'crdate', date('Y-01-01'), date('Y-m-d')]);
        }else  if(!empty($params['sort']) && empty($params['VListallpolicySearch'])){
            $query->andFilterWhere(['between', 'crdate', date('Y-01-01'), date('Y-m-d')]);
        }else  if(!empty($params['page']) && empty($params['VListallpolicySearch'])){
            $query->andFilterWhere(['between', 'crdate', date('Y-01-01'), date('Y-m-d')]);
        }
        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'query' => $query,
            'sort'=> ['defaultOrder' => ['pol_id' => SORT_DESC]]
        ]);

        if (!($this->load($params))) {
            return $dataProvider;
        }

        if(!empty($this->pol_date_range)){
        $date_range = explode("-",str_replace(' ', '', $this->pol_date_range));
        $date_start = date('Y-m-d', strtotime(str_replace('/', '-', $date_range[0])));
        $date_end = date('Y-m-d', strtotime(str_replace('/', '-', $date_range[1])));
        $query->andFilterWhere(['between', 'crdate', $date_start, $date_end]);
        }

        $query->andFilterWhere(['like', 'pol_service_no', $this->pol_service_no]);
        $query->andFilterWhere(['like', 'pol_model', $this->pol_model]);
        $query->andFilterWhere(['like', 'pol_holder_name', $this->pol_holder_name]);
        $query->andFilterWhere(['=', 'pol_status', $this->pol_status]);
        $query->andFilterWhere(['=', 'contract_partner_id', $this->contract_partner_id]);
        $query->andFilterWhere(['=', 'contract_outlets_id', $this->contract_outlets_id]);
        $query->andFilterWhere(['=', 'pol_brand', $this->pol_brand]);
        $query->andFilterWhere(['=', 'pol_appliance_type', $this->pol_appliance_type]);
        $query->andFilterWhere(['=', 'package_id', $this->package_id]);
        $query->andFilterWhere(['like', 'pol_serial_no', $this->pol_serial_no]);
        $query->andFilterWhere(['like', 'pol_ticket_number', $this->pol_ticket_number]);
        return $dataProvider;
    }

}
