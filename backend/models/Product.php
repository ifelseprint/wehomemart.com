<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

class Product extends \common\models\Product
{

    public $pageSize = 25;

    // public function attributeLabels()
    // {
    //     return [
    //         'product_icon' => 'Product Icon',
    //     ];
    // }
    public function rules()
    {
        return array_merge(parent::rules(), [
            // [['product_icon'], 'safe'],
            // [['product_icon'], 'file','skipOnEmpty' => false,'extensions' =>'jpg, gif, png'],
            [['pageSize'], 'integer'],
        ]);
    }
    public function search($params)
    {

        $query = Product::find();
        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'query' => $query,
            'sort'=> ['defaultOrder' => ['product_id' => SORT_DESC]]
        ]);

        if (!($this->load($params))) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'product_name_th', $this->product_name_th]);
        $query->andFilterWhere(['like', 'product_name_en', $this->product_name_en]);
        $query->andFilterWhere(['=', 'is_active', $this->is_active]);

        return $dataProvider;
    }

    public function upload($fileName)
    {

        if ($this->validate()) {
            $this->product_icon->saveAs($fileName);
            return true;
        } else {
            return false;
        }

    }
}
