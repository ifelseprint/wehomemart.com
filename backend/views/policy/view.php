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
        <h1 class="m-0 text-dark"><i class="icofont icofont-coins"></i> Policy <small>View</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i> Home</a></li>
          <li class="breadcrumb-item active">Policy View</li>
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
        <h3 class="card-title"><i class="icofont icofont-folder-search"></i> Search Policy</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_service_no')->textInput(['value' => (!empty($search['VListallpolicySearch']['pol_service_no'])) ? $search['VListallpolicySearch']['pol_service_no'] : '' ])?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'package_id')->dropDownList($dataPackage,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_appliance_type')->dropDownList($dataApplianceType,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
        </div>
        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_brand')->dropDownList($dataBrand,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_serial_no')->textInput(['value' => (!empty($search['VListallpolicySearch']['pol_serial_no'])) ? $search['VListallpolicySearch']['pol_serial_no'] : '' ])?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_holder_name')->textInput(['value' => (!empty($search['VListallpolicySearch']['pol_holder_name'])) ? $search['VListallpolicySearch']['pol_holder_name'] : '' ])?>
          </div>
        </div>
        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'contract_partner_id')->dropDownList($dataPartner,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8','id' => 'contract_partner_id','onchange'=>'$.get("'.Url::toRoute('policy/outlets-list').'",{id: $(this).val()}).done(function(data){$( "select#contract_outlets_id" ).html(data);});']);?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'contract_outlets_id')->dropDownList($dataOutlet,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8','id' => 'contract_outlets_id']); ?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_ticket_number')->textInput(['value' => (!empty($search['VListallpolicySearch']['pol_ticket_number'])) ? $search['VListallpolicySearch']['pol_ticket_number'] : '' ])?>
          </div>
        </div>
        <hr>
        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'pol_date_range')->textInput(['class' => 'col-sm-8 form-control form-control-sm datepicker', 'autocomplete' => 'off', 'value' => (!empty($search['VListallpolicySearch']['pol_date_range'])) ? $search['VListallpolicySearch']['pol_date_range'] : date("01/01/Y").' - '.date("d/m/Y") ]);?>
          </div>
          <div class="col-sm-4">
            <?php
            $dataStatus=['0'=>'Pending','1'=>'Valid','2'=>'Cancel'];
            ?>
            <?= $form->field($model, 'pol_status')->dropDownList($dataStatus,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
          <div class="col-sm-4">
            <?php
            $dataPageSize=['15'=>'15 Record','25'=>'25 Record','50'=>'50 Record','75'=>'75 Record','100'=>'100 Record'];
            ?>
            <?= $form->field($model, 'pageSize')->dropDownList($dataPageSize,['class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
        </div>       
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

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-list"></i> Result list</h3>
      </div>
      <div class="card-body table-responsive p-0">
      <?php
      echo GridView::widget([
        'tableOptions' => ['class' => 'table table-hover table-striped table-sm m-0'],
        'dataProvider' => $dataProvider,
        'layout'=> '{items} <div class="card-footer clearfix"><div class="float-left">{summary}</div><div class="float-right">{pager}</div></div>',
        'pager' => [
          'options' => ['class' => 'pagination pagination-sm m-0'],
          'firstPageLabel' => 'First',
          'lastPageLabel'  => 'Last',
        ],
        'columns' => [
          [
            'attribute' => 'pol_service_no',
            'label' => 'หมายเลขใบรับรอง',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:180px'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->pol_service_no.'</div>';
            },
          ],
          [
            'attribute' => 'appliance_type_name',
            'label' => 'ประเภทของอุปกรณ์',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:180px'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->appliance_type_name.'</div>';
            },
          ],
          [
            'attribute' => 'brand_name',
            'label' => 'ยี่ห้อ',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:100px'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->brand_name.'</div>';
            },
          ],
          [
            'attribute' => 'pol_model',
            'label' => 'รุ่น',
            'format' => 'raw',
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->pol_model.'</div>';
            },
          ],
          [
            'attribute' => 'pol_holder_name',
            'label' => 'ชื่อ-นามสกุล',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:200px;'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->pol_holder_name.'</div>';
            },
          ],
          [
            'attribute' => 'crdate',
            'label' => 'วันที่ซื้อ',
            'contentOptions' => ['style' => 'width:90px'],
            'value' => function($model){return date("d/m/Y", strtotime($model->crdate));},
          ],
          [
            'attribute' => 'pol_status',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:60px'],
            'label' => 'สถานะ',
            'value' => function ($model){
              switch ($model->pol_status) {
                case 0:
                  $status_icon = 'badge-warning';
                  $status_text = 'Pending';
                  break;
                case 1:
                  $status_icon = 'badge-success';
                  $status_text = 'Valid';
                  break;
                case 2:
                  $status_icon = 'badge-danger';
                  $status_text = 'Cancel';
                  break;
              }
              return Html::tag('span', $status_text, ['class'=>'badge badge-lg '.$status_icon]);
            }
          ],
          [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'คำสั่ง',
            'headerOptions' => ['style' => 'color:#009482; width:60px;'],
            'template' => '{Update} {Delete}',
            'buttons'  => [
              'View'   => function ($url, $model) {
                $url = Url::to(['policy/view']);
                return Html::a('<span class="fa fa-eye"></span>', $url, [
                  'title' => 'view',
                  'data-method'  => 'post',
                  'data-pjax' => 0,
                  'data-params' => [
                    'pol_id' => $model->pol_id
                  ]
                ]);
              },
              'Update' => function ($url, $model) {
                $url = Url::to(['policy/update','id' => $model->pol_id]);
                return Html::a('<span class="fas fa-edit"></span>', $url, [
                  'title'        => 'update',
                  // 'data-method'  => 'post',
                  'data-pjax' => 0,
                  'data-params' => [
                    'pol_id' => $model->pol_id
                  ]
                ]);
              },
              'Delete' => function ($url, $model) {
                $url = Url::to(['policy/delete']);
                return Html::a('<span class="fas fa-trash-alt"></span>', $url, [
                  'title'        => 'delete',
                  'data-confirm' => Yii::t('yii', 'Are you sure you want to delete '.$model->pol_id.' this item?'),
                  'data-method'  => 'post',
                  'data-pjax' => 0,
                  'data-params' => [
                    'pol_id' => $model->pol_id
                  ]
                ]);
              },
            ]
          ],
        ],
      ]);
      ?>
      </div> <!-- close card-body -->
    </div> <!-- close card -->
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