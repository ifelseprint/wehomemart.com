<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin([
  'method' => 'post',
  'id' => 'form-contact',
  'action' => ['contact/index'],
  'options' => ['enctype' => 'multipart/form-data','data-pjax' => true ],
  'fieldConfig' => [
    'template' => "{input} {error}",
    'inputOptions' => ['class' => 'form-control'],
  ],
]);
?>

<div class="form-group-sm row">
  <div class="col-sm-6">
    <?= $form->field($ContactForm, 'contact_form_first_name')->textInput(['placeholder'=>Yii::$app->translated->get(42)])?>
  </div>
  <div class="col-sm-6">
    <?= $form->field($ContactForm, 'contact_form_last_name')->textInput(['placeholder'=>Yii::$app->translated->get(43)])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <?= $form->field($ContactForm, 'contact_form_tel')->textInput(['placeholder'=> Yii::$app->translated->get(38)])?>
  </div>
  <div class="col-sm-6">
    <?= $form->field($ContactForm, 'contact_form_email')->textInput(['placeholder'=>Yii::$app->translated->get(39)])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= $form->field($ContactForm, 'contact_form_message')->textArea(['class' => 'form-control', 'placeholder'=>Yii::$app->translated->get(44)]) ?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= Html::submitButton(Yii::$app->translated->get(45), ['class' => 'btn btn-primary']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>