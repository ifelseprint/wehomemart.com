<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class Service extends \common\models\Service
{

    public $pageSize = 25;
    public $banner_image;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['banner_image'],'file'],
            [['pageSize'], 'integer'],
        ]);
    }
    public function search($params)
    {

        $query = Service::find();
        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'query' => $query,
            'sort'=> ['defaultOrder' => ['service_id' => SORT_DESC]]
        ]);

        if (!($this->load($params))) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'service_name_th', $this->service_name_th]);
        $query->andFilterWhere(['like', 'service_name_en', $this->service_name_en]);
        $query->andFilterWhere(['=', 'is_active', $this->is_active]);

        return $dataProvider;
    }
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if ($insert) {
            //new record code here
            $this->created_user =  '1';
            $this->created_date =  date("Y-m-d H:i:s");
        } else {
            $this->modified_user =  '1';
            $this->modified_date = date("Y-m-d H:i:s");
        }
        return true;
    }
}
