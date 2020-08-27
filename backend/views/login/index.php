<?php
use yii\helpers\Html;
use yii\base\Widget;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<?php Pjax::begin(['id' => 'pjax-grid','timeout' => 0,'enablePushState' => false,]); ?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
    <div class="loader-content loader-center">
        <div id="loading" class="loader"></div>
    </div>
</div>
<div class="wrapper">
  <div class="login-main-box">
    <div class="row">
      <div class="col-6 text-left">
        <div class="login-logo text-left">
          <a href="#">
            <img src="../dist/img/Alliance_Assistance_Logo_positive.png" alt="">
          </a>
        </div>
      </div>
      <div class="col-6 text-right" style="padding-top:10px">
        <div class="appname-header">
          <i class="fa fa-heartbeat" style="color:#009482"></i>  MEDNET <small>4.0</small>
        </div>
      </div>
    </div>
    <div class="card">                           
      <div class="row">
        <div class="col-6" style="background: url(../dist/img/GettyImages-696136671_super.jpg) no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;background-size: cover;"></div>
        <div class="col-6 p-3">
          <div class="card-body login-card-body">
            <?= $this->render('_form', ['model'=> $model]); ?>
          </div>
         <!-- /.login-card-body -->
        </div> 
      </div>
    </div>
  </div>
</div>
<?php
$script = <<<JS
  $("document").ready(function(){

    $("#pjax-grid").on("pjax:start", function() {
      $('#loadingOverlay').show();
    });
    $("#pjax-grid").on("pjax:end", function() {
      $('#loadingOverlay').hide();
    });
  });
JS;
$this->registerJs($script);
?>
<?php Pjax::end(); ?>