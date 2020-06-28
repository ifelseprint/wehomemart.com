<?php
namespace common\components;

use Yii;
use yii\base\Component;

class slug extends Component {

    public static function create($string) {

        $table = array(
            '/' => '-', ' ' => '-', '"' => '-', "'" => '-'
        );
        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
        // -- Returns the slug
        return strtolower(strtr($string, $table));
    }

}
?>