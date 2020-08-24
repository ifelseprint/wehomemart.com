<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class Service extends \common\models\Service
{

    public $pageSize = 25;


    public function rules()
    {
        return array_merge(parent::rules(), [
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
}
