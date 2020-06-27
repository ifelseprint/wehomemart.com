<?php
use yii\helpers\Html;
use yii\base\Widget;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="icofont icofont-coins"></i> Policy <small>Create</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i> Home</a></li>
          <li class="breadcrumb-item active">Policy Create</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<?php Pjax::begin(['id' => 'pjax-grid','timeout' => 0,'enablePushState' => false]); ?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
    <div class="loader-content loader-center">
        <div id="loading" class="loader"></div>
    </div>
</div>
<!-- <div id="loading" class="loader"></div> -->
<div class="content">
  <div class="container">
    <!-- Search Box Start ################# -->
    <?php 
    $form = ActiveForm::begin([
        'method' => 'get',
        'id' => 'create-policy',
        'layout' => 'horizontal',
        'enableClientValidation' => false,
        'options' => [ 'data-pjax' => 0 ],
        'validationStateOn' => ActiveForm::VALIDATION_STATE_ON_INPUT,
        'fieldConfig' => [
            'options' => [
              'class' => 'form-group'
            ],
            'template' => "{beginLabel}{labelTitle} :{endLabel}\n{input}\n{error}",
            // 'labelOptions' => ['class' => 'control-label'],
            // 'inputOptions' => ['class' => 'form-control form-control-sm'],
            'labelOptions' => ['class' => 'col-sm-4 float-left control-label'],
            'inputOptions' => ['class' => 'col-sm-8 form-control form-control-sm'],
            'errorOptions' => [
                'tag' => 'div',
                'class' => 'col-sm-8 float-left m-0 p-0 error invalid-feedback'
            ],
        ],
        'errorCssClass' => 'is-invalid'
    ]);
    ?>
    <div class="card card-outline card-info">
      <div class="card-header">
        <h3 class="card-title"><i class="icofont icofont-folder-search"></i> เลือกแผนบริการขยายระยะเวลารับประกันสินค้า</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'contract_partner_id')->dropDownList($dataPartner,['prompt'=>': : : กรุณาเลือก : : :','class'=>'form-control form-control-sm select2 col-sm-8','id' => 'contract_partner_id','onchange'=>'

              $.get("'.Url::toRoute('policy/clear-list').'",{
                id: $(this).val()
              }).done(function(data){
                 $("select.list").html(data);
              });

              $.get("'.Url::toRoute('policy/contract-header-list').'",{
                id: $(this).val()
              }).done(function(data){
                 $("select#contract_contract_id").html(data);
              });

              $.get("'.Url::toRoute('policy/partner-appliance-list').'",{
                id: $(this).val()
              }).done(function(data){
                 $("select#pol_appliance_type").html(data);
              });
            ']);?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'contract_contract_id')->dropDownList([],['prompt'=>': : : กรุณาเลือก : : :','class'=>'list form-control form-control-sm select2 col-sm-8','id' => 'contract_contract_id','onchange'=>'
              $.get("'.Url::toRoute('policy/contract-outlets-list').'",{
                id: $(this).val()
              }).done(function(data){
                 $("select#contract_outlets_id").html(data);
              });

              $.get("'.Url::toRoute('policy/contract-package-list').'",{
                id: $(this).val()
              }).done(function(data){
                 $("select#package_id").html(data);
              });
            ']);?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'package_id')->dropDownList([],['prompt'=>': : : กรุณาเลือก : : :','class'=>'list form-control form-control-sm select2 col-sm-8','id' => 'package_id']); ?>
          </div>
        </div>
        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'contract_outlets_id')->dropDownList([],['prompt'=>': : : กรุณาเลือก : : :','class'=>'list form-control form-control-sm select2 col-sm-8','id' => 'contract_outlets_id']); ?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_appliance_type')->dropDownList([],['prompt'=>': : : กรุณาเลือก : : :','class'=>'list form-control form-control-sm select2 col-sm-8','id' => 'pol_appliance_type']); ?>
          </div>
        </div> 
      </div>
      <!-- /.card-body -->      
    </div>

    <div class="card card-outline card-info">
      <div class="card-header">
        <h3 class="card-title"><i class="icofont icofont-folder-search"></i> ระยะเวลาการรับประกันสินค้า</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Export</button>
        <div class=" float-right">
          <?= Html::submitButton('<i class="icofont icofont-search"></i> Search', ['class' => 'btn btn-info btn-sm', 'name' => 'search-button']); ?>                
          <button type="button" class="btn btn-secondary btn-sm"><i class="icofont icofont-close"></i> Cancel</button>
        </div>
      </div>         
    </div>

    <?php ActiveForm::end(); ?>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?php

$script = <<<JS
  $("document").ready(function(){

    $("#pjax-grid").on("pjax:start", function() {
      $('#loadingOverlay').show();
    });
    $("#pjax-grid").on("pjax:end", function() {
      $('#loadingOverlay').hide();
    });

    $('.datepicker').daterangepicker({

      autoUpdateInput: false,
      locale: {
          "format": "DD/MM/YYYY",
          "separator": " - ",
          "applyLabel": "Apply",
          "cancelLabel": "Cancel",
          "fromLabel": "From",
          "toLabel": "To",
          "customRangeLabel": "Custom",
          "weekLabel": "W",
          "firstDay": 1
      },
      maxDate: new Date(),
      drops: "up",
      showDropdowns: true,
    },function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
    $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    //Initialize Select2 Elements
    $('.select2').select2();
  });
JS;
$this->registerJs($script,\yii\web\View::POS_READY);
?>
<?php Pjax::end(); ?>