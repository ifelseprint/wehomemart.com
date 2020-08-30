<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin([
  'method' => 'post',
  'id' => 'form-contact',
  'action' => ['join/view'],
  'options' => ['enctype' => 'multipart/form-data','data-pjax' => true ],
  'fieldConfig' => [
    'template' => "{input} {error}",
    'inputOptions' => ['class' => 'form-control'],
  ],
]);
?>
<div class="form-group-sm row">
	<div class="col-sm-1">
		<label>Title <span class="require">*</span></label>
	</div>
    <div class="col-sm-11">
		<?=$form->field($JobsForm, 'jobs_form_prefix',['wrapperOptions' => ['style' => 'display:inline-block']])->label(false)->inline(true)->radioList(array(1=>'Mr.',2=>'Mrs.',3=>'Ms.'));?>
	</div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
  	<label>First name <span class="require">*</span></label>
    <?= $form->field($JobsForm, 'jobs_form_first_name')->textInput()?>
  </div>
  <div class="col-sm-6">
  	<label>Last name <span class="require">*</span></label>
    <?= $form->field($JobsForm, 'jobs_form_last_name')->textInput()?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
  	<label>Date of birth <span class="require">*</span></label>
    <?= $form->field($JobsForm, 'jobs_form_birthday')->textInput(['class' => 'form-control datepicker','autocomplete' => 'off', 'readonly'=>'readonly','style'=>'background:#fafafa;'])?>
  </div>
  <div class="col-sm-6">
  	<label>Nationality <span class="require">*</span></label>
  	<?php
    $dataNationality=['1'=>'สัญชาติไทย','2'=>'ต่างชาติ'];
    ?>
    <?= $form->field($JobsForm, 'jobs_form_nationality')->dropDownList($dataNationality,['class'=>'form-control']); ?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
  	<label>Mobile phone <span class="require">*</span></label>
    <?= $form->field($JobsForm, 'jobs_form_tel')->textInput()?>
  </div>
  <div class="col-sm-6">
  	<label>Email <span class="require">*</span></label>
    <?= $form->field($JobsForm, 'jobs_form_email')->textInput()?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
  	<label>Address </label>
    <?= $form->field($JobsForm, 'jobs_form_address')->textArea(['rows'=>'3']) ?>
  </div>
</div>
<div class="form-group row">
	<div class="col-sm-12">
		<div style="background: #f5f5f5;padding: 20px;">
			<table style="width: 100%" cellpadding="5">
				<tr>
					<td style="width: 40%; text-align: right;">Resume</td>
					<td style="width: 60%; text-align: left;">
						<?= $form->field($JobsForm, 'jobs_form_file')->fileInput(['class' => 'form-control-file','accept' => '*']); ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;font-size: 14px; font-weight: 200;">Attach file (Maximun file: 2MB The .doc, .docx and .pdf are allowed.)</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
  	<?=$form->field($JobsForm, 'jobs_form_view')->hiddenInput(['value'=> $JobView])->label(false);?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>