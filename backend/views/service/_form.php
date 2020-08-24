<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>
<?php
$action = Yii::$app->controller->action->id;
$url = $action=='create'? $action : $action.'/'.$Service['service_id'];
?>
<?php $form = ActiveForm::begin([
  'method' => 'post',
  'id' => 'form-' . $action,
  'action' => ['service/'.$url],
  'options' => ['enctype' => 'multipart/form-data','data-pjax' => true ],
  'fieldConfig' => [
    'template' => "{input}",
    'inputOptions' => ['class' => 'form-control form-control-sm'],
  ],
]);
?>
<div style="margin-bottom: 25px;">


  <div class="form-group-sm row">
    <div class="col-sm-6">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title"><i class="far fa-address-card"></i> Support Language (TH)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">

          <div class="form-group-sm row">
            <div class="col-sm-12">
              <label class="col-form-label-sm">Service Name:</label>
              <?= $form->field($Service, 'service_name_th')->textInput()?>
            </div>
          </div>

          <div class="form-group-sm row">
            <div class="col-sm-12">
              <label class="col-form-label-sm">Service Description (Quick):</label>
              <?= $form->field($Service, 'service_content_th')->textInput() ?>
            </div>
          </div>

          <div class="form-group-sm row">
            <div class="col-sm-12">
              <label class="col-form-label-sm">Service Description (Expanded):</label>
              <?= $form->field($ServiceDetail, 'service_detail_content_th')->textArea(['class' => 'form-control form-control-sm editor']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title"><i class="far fa-address-card"></i> Support Language (EN)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">

          <div class="form-group-sm row">
            <div class="col-sm-12">
              <label class="col-form-label-sm">Service Name:</label>
              <?= $form->field($Service, 'service_name_en')->textInput()?>
            </div>
          </div>

          <div class="form-group-sm row">
            <div class="col-sm-12">
              <label class="col-form-label-sm">Service Description (Quick):</label>
              <?= $form->field($Service, 'service_content_en')->textInput() ?>
            </div>
          </div>

          <div class="form-group-sm row">
            <div class="col-sm-12">
              <label class="col-form-label-sm">Service Description (Expanded):</label>
              <?= $form->field($ServiceDetail, 'service_detail_content_en')->textArea(['class' => 'form-control form-control-sm editor']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title"><i class="far fa-address-card"></i> Support Language (TH/EN)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <div class="form-group-sm row">
            <div class="col-sm-6">
              <table border="1" width="100%" cellpadding="10" style="border: 1px solid #ccc;">
                <tr>
                  <td width="100">
                    <img src="../uploads/<?=$Service->service_image_path?>/<?=$Service->service_image?>" width="100" height="70">
                  </td>
                  <td>
                    <label class="col-form-label-sm">Service Image:</label>
                    <?= $form->field($Service, 'service_image')->fileInput(['class' => 'form-control form-control-sm']); ?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6">
              <table border="1" width="100%" cellpadding="10" style="border: 1px solid #ccc;">
                <tr>
                  <td colspan="2">
                    <label class="col-form-label-sm">Status</label>
                    <?php
                    $dataStatus=['1'=>'Active','0'=>'Inactive'];
                    ?>
                    <?= $form->field($Service, 'is_active')->dropDownList($dataStatus,['class'=>'form-control form-control-sm select2']); ?>

                  </td>
                </tr>
              </table>
            </div>

          </div>
        
        </div>
      </div>
    </div>
  </div>
</div>
<?php ActiveForm::end(); ?>