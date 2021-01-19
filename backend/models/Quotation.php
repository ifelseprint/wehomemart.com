<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class Quotation extends \common\models\Quotation
{

    public $pageSize = 25;
    public $searchCode;
    public $searchFirstName;
    public $searchLastName;
    public $searchTel;
    public $searchEmail;
    public $searchFromDate;
    public $searchToDate;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['searchFirstName', 'searchLastName', 'searchEmail'], 'string', 'max' => 100],
            [['searchTel'], 'string', 'max' => 20],
            [['searchFromDate','searchToDate','searchCode'], 'safe'],
            [['pageSize'], 'integer'],
        ]);
    }
    public function search($params)
    {

        $query = Quotation::find();
        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['created_date' => SORT_DESC]
            ]
        ]);

        if (!($this->load($params))) {
            return $dataProvider;
        }
        if(!empty($this->searchFromDate)){
        $query->andFilterWhere(['>=', 'created_date',date('Y-m-d', strtotime(str_replace('/', '-', $this->searchFromDate)))]);
        }
        if(!empty($this->searchToDate)){
        $query->andFilterWhere(['<=', 'created_date',date('Y-m-d', strtotime(str_replace('/', '-', $this->searchToDate)))]);
        }
        $query->andFilterWhere(['like', 'quotation_code', $this->searchCode]);
        $query->andFilterWhere(['like', 'quotation_firstname', $this->searchFirstName]);
        $query->andFilterWhere(['like', 'quotation_lastname', $this->searchLastName]);
        $query->andFilterWhere(['like', 'quotation_telephone', $this->searchTel]);
        $query->andFilterWhere(['like', 'quotation_email', $this->searchEmail]);

        return $dataProvider;
    }
}
