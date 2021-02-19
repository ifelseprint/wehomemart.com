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
        <h1 class="m-0 text-dark"><i class="icofont icofont-coins"></i> User <small>List</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i> Home</a></li>
          <li class="breadcrumb-item active">User List</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<?php Pjax::begin(['id' => 'pjax-grid','timeout' => 0,'enablePushState' => false,]); ?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
    <div class="loader-content loader-center">
        <div id="loading" class="loader"></div>
    </div>
</div>

<div class="content">
  <div class="container">

    <?= $this->render('_search', ['model'=> $model,'search' => $search]); ?>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-list"></i> Result list</h3>
      </div>
      <div class="card-body table-responsive p-0">
      <?php
      echo GridView::widget([
          'tableOptions' => ['class' => 'table table-hover table-striped table-sm m-0'],
          'layout'=> '{items} <div class="card-footer clearfix"><div class="float-left">{summary}</div><div class="float-right">{pager}</div></div>',
          'pager' => [
              'options' => ['class' => 'pagination pagination-sm m-0'],
              'firstPageLabel' => 'First',
              'lastPageLabel'  => 'Last',
          ],
          'dataProvider' => $dataProvider,
          'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:50px'],
            ],
            [
                'attribute' => 'user_firstname',
                'label' => 'First Name',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:180px'],
                'value' => function ($model) {
                    return '<div style="height: 25px;overflow:hidden;">'.$model->user_firstname.'</div>';
                },
            ],
            [
                'attribute' => 'user_lastname',
                'label' => 'Last Name',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:180px'],
                'value' => function ($model) {
                    return '<div style="height: 25px;overflow:hidden;">'.$model->user_lastname.'</div>';
                },
            ],
            [
                'attribute' => 'user_telephone',
                'label' => 'Telephone',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:120px'],
                'value' => function ($model) {
                    return '<div style="height: 25px;overflow:hidden;">'.$model->user_telephone.'</div>';
                },
            ],
            [
                'attribute' => 'user_email',
                'label' => 'Email',
                'format' => 'raw',
                'contentOptions' => [],
                'value' => function ($model) {
                    return '<div style="height: 25px;overflow:hidden;">'.$model->user_email.'</div>';
                },
            ],
            [
                'attribute' => 'created_date',
                'label' => 'Created Date',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:130px'],
                'value' => function ($model) {
                    return '<div style="height: 25px;overflow:hidden;">'.date('d/m/Y H:i:s', strtotime($model->created_date));'</div>';
                },
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'headerOptions' => ['style' => 'color:#009482; width:50px;'],
              'template' => '{View}',
              'buttons'  => [
                'View' => function ($url,$model) {
                  return Html::a('<span class="fa fa-eye" style="padding:0px 2px;"></span>','', [
                    'class' => 'btn-modal-view',
                    'title' => 'edit',
                    'data-toggle' => 'modal',
                    'value' => Url::to('member/view/'.$model->login_id),
                  ]);
                }
              ]
            ],
          ],
      ]);
      ?>
      </div>
    </div>
  </div>
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
      singleDatePicker: true,
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
        $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });
    $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize initializeInPjax
    appWebsite.App.initializeInPjax();
  });

  
JS;
$this->registerJs($script);
?>
<?php Pjax::end(); ?>


<?= $this->render('_modal', ['model'=> $model,'search' => $search]); ?>