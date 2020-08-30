<?php
namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Translate;
class translated extends Component {

    public static function get($translate_id) {

        $Translate = Translate::findOne(['translate_id' => $translate_id]);
        $text = 'translate_'.Yii::$app->language;;
        return $Translate->$text;
    }

}
?>