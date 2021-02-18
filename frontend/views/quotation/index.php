<?php
use frontend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
// use frontend\assets\ProductAsset;
// ProductAsset::register($this);
?>
<main class="main">
    <?= $this->render('_form_quotation', ['Quotation'=> $Quotation,'dataProvinces'=>$dataProvinces,'dataAmphures'=>$dataAmphures,'dataDistricts'=>$dataDistricts,'dataProjectCategory'=>$dataProjectCategory,'dataProduct'=>$dataProduct,'id'=>$id]); ?>
</main>

<?php
$script = <<<JS
  $("document").ready(function(){
    appWEHOME.App.initializeInPjax();
  });
JS;
$this->registerJs($script);
?>