<?php
use frontend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
// use frontend\assets\ProductAsset;
// ProductAsset::register($this);
?>
<main class="main">
	<ul class="nav nav-pills" id="pills-tab" role="tablist" style="align-items: center;justify-content: center;">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><?= Yii::t('app', 'txt_register');?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><?= Yii::t('app', 'txt_login');?></a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <?= $this->render('_form_register', ['Users'=> $Users]); ?>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?= $this->render('_form_login', ['Users'=> $Users]); ?>
        </div>
    </div>
</main>


<?php
$script = <<<JS
  $("document").ready(function(){
    appWEHOME.App.initializeInPjax();
  });
JS;
$this->registerJs($script);
?>