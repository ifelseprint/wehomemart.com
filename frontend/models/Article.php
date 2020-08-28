<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

class Article extends \common\models\Article
{
    public function afterFind() {
        $this->pageview++;
        $this->save();
    }
}
