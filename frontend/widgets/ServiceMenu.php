<?php
namespace frontend\widgets;

class ServiceMenu extends \yii\base\Widget {

    public $action;

    public function run() {

        $models = \common\models\Service::find()
        ->where(['is_active' => 1])
        ->orderBy(['service_id' => SORT_ASC])
        ->all();

        return $this->render('service_menu_link_nav', [
            'service' => $models,
        ]);
    }
}
?>