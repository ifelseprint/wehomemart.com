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
        <h1 class="m-0 text-dark"><i class="icofont icofont-coins"></i> User <small>View</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i> Home</a></li>
          <li class="breadcrumb-item active">User View</li>
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
    <?php 
    $form = ActiveForm::begin([
        'method' => 'get',
        'id' => 'user-view',
        'layout' => 'horizontal',
        'enableClientValidation' => false,
        'options' => [ 'data-pjax' => 0 ],
        'validationStateOn' => ActiveForm::VALIDATION_STATE_ON_INPUT,
        'fieldConfig' => [
            'options' => [
              'class' => 'form-group'
            ],
            'template' => "{beginLabel}{labelTitle} :{endLabel}\n{input}\n{error}",
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
        <h3 class="card-title"><i class="icofont icofont-folder-search"></i> Search User</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
 
      </div>
      <div class="card-body">

        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?= $form->field($model, 'user_login_name')->textInput(['value' => (!empty($search['User']['user_login_name'])) ? $search['User']['user_login_name'] : '' ])?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'user_fullname')->textInput(['value' => (!empty($search['User']['user_fullname'])) ? $search['User']['user_fullname'] : '' ])?>
          </div>
          <div class="col-sm-4">
            <?= $form->field($model, 'user_email')->textInput(['value' => (!empty($search['User']['user_email'])) ? $search['User']['user_email'] : '' ])?>
          </div>
        </div>
        <div class="form-group-sm row">
          <div class="col-sm-4">
            <?php
            $dataStatus=['Y'=>'Acive','N'=>'Inactive'];
            ?>
            <?= $form->field($model, 'is_active')->dropDownList($dataStatus,['prompt'=>': : : ทั้งหมด : : :','class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
          <div class="col-sm-4">
            <?php
            $dataPageSize=['15'=>'15 Record','25'=>'25 Record','50'=>'50 Record','75'=>'75 Record','100'=>'100 Record'];
            ?>
            <?= $form->field($model, 'pageSize')->dropDownList($dataPageSize,['class'=>'form-control form-control-sm select2 col-sm-8']); ?>
          </div>
          <div class="col-sm-4">
          </div>
        </div>
          
      </div>

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
            'attribute' => 'user_login_name',
            'label' => 'user_login_name',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:180px'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->user_login_name.'</div>';
            },
          ],
          [
            'attribute' => 'user_fullname',
            'label' => 'user_fullname',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:180px'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->user_fullname.'</div>';
            },
          ],
          [
            'attribute' => 'user_email',
            'label' => 'user_email',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:180px'],
            'value' => function ($model) {
              return '<div style="height: 25px;overflow:hidden;">'.$model->user_email.'</div>';
            },
          ],
          [
            'attribute' => 'is_active',
            'format' => 'raw',
            'contentOptions' => ['style' => 'width:60px'],
            'label' => 'สถานะ',
            'value' => function ($model){
              switch ($model->is_active) {
                case 'Y':
                  $status_icon = 'badge-success';
                  $status_text = 'Active';
                  break;
                case 'N':
                  $status_icon = 'badge-danger';
                  $status_text = 'Inactive';
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
                $url = Url::to(['user/view']);
                return Html::a('<span class="fa fa-eye"></span>', $url, [
                  'title' => 'view',
                  'data-method'  => 'post',
                  'data-pjax' => 0,
                  'data-params' => [
                    'user_id' => $model->user_id
                  ]
                ]);
              },
              'Update' => function ($url, $model) {
                $url = Url::to(['user/update','id' => $model->user_id]);
                return Html::a('<span class="fas fa-edit"></span>', $url, [
                  'title'        => 'update',
                  'data-method'  => 'post',
                  'data-pjax' => 0,
                  'data-params' => [
                    'user_id' => $model->user_id
                  ]
                ]);
              },
              'Delete' => function ($url, $model) {
                $url = Url::to(['user/delete']);
                return Html::a('<span class="fas fa-trash-alt"></span>', $url, [
                  'title'        => 'delete',
                  'data-confirm' => Yii::t('yii', 'Are you sure you want to delete '.$model->user_id.' this item?'),
                  'data-method'  => 'post',
                  'data-pjax' => 0,
                  'data-params' => [
                    'user_id' => $model->user_id
                  ]
                ]);
              },
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

    //Initialize Select2 Elements
    $('.select2').select2();
  });
JS;
$this->registerJs($script);
?>
<?php Pjax::end(); ?>