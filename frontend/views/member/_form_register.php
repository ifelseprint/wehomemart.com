<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php
$action = Yii::$app->controller->action->id;

$form = ActiveForm::begin([
    'action' => ['member/index'],
    'method' => 'post',
    'options' => ['id' => 'formMember', 'class' => 'form-horizontal','enctype' => 'multipart/form-data' ],
    'enableClientValidation' => true,
    'fieldConfig' => [
        'template' => "{input} {error}",
        'inputOptions' => ['class' => 'form-control'],
        'options' => [
          'data-pjax' => true,
          'tag' => false,
        ],
    ],
]); ?>

<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('user_email')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'login_username')->textInput(['placeholder'=> $Users->getAttributeLabel('user_email'), 'required' => true,'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$','data-msg'=> Yii::t('app', 'validate_email')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('login_password')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'login_password')->textInput(['placeholder'=> $Users->getAttributeLabel('login_password'),'required' => true,'data-msg'=> Yii::t('app', 'validate_password')])?>
  </div>
</div>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_firstname')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_firstname')->textInput(['placeholder'=> $Users->getAttributeLabel('user_firstname'), 'required' => true,'data-msg'=> Yii::t('app', 'validate_firstname')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_lastname')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_lastname')->textInput(['placeholder'=> $Users->getAttributeLabel('user_lastname'), 'required' => true,'data-msg'=> Yii::t('app', 'validate_lastname')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('user_telephone')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_telephone')->textInput(['placeholder'=> $Users->getAttributeLabel('user_telephone'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '^0[0-9]{8,10}','maxlength' =>'10','data-msg'=> Yii::t('app', 'validate_telephone')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_age')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_age')->textInput(['placeholder'=> $Users->getAttributeLabel('user_age'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]+','data-msg'=> Yii::t('app', 'validate_age')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_career')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_career')->textInput(['placeholder'=> $Users->getAttributeLabel('user_career'),'required' => true,'data-msg'=> Yii::t('app', 'validate_career')])?>
  </div>
</div>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('user_location')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_location')->textInput(['placeholder'=> $Users->getAttributeLabel('user_location'),'required' => true,'data-msg'=> Yii::t('app', 'validate_location')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('user_company')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_company')->textInput(['placeholder'=> $Users->getAttributeLabel('user_company'),'required' => true,'data-msg'=> Yii::t('app', 'validate_company')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('user_tax_id')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_tax_id')->textInput(['placeholder'=> $Users->getAttributeLabel('user_tax_id'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','data-msg'=> Yii::t('app', 'validate_tax_id')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-4">
    <label><?=$Users->getAttributeLabel('user_address')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_address')->textInput(['placeholder'=> $Users->getAttributeLabel('user_address'),'required' => true,'data-msg'=> Yii::t('app', 'validate_address')])?>
  </div>
  <div class="col-sm-4">
    <label><?=$Users->getAttributeLabel('user_building')?></label>
    <?= $form->field($Users, 'user_building')->textInput(['placeholder'=> $Users->getAttributeLabel('user_building')])?>
  </div>
  <div class="col-sm-4">
    <label><?=$Users->getAttributeLabel('user_moo')?></label>
    <?= $form->field($Users, 'user_moo')->textInput(['placeholder'=> $Users->getAttributeLabel('user_moo')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_district')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_district')->textInput(['placeholder'=> $Users->getAttributeLabel('user_district'),'required' => true,'data-msg'=> Yii::t('app', 'validate_district')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_amphur')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_amphur')->textInput(['placeholder'=> $Users->getAttributeLabel('user_amphur'),'required' => true,'data-msg'=> Yii::t('app', 'validate_amphur')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_province')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_province')->textInput(['placeholder'=> $Users->getAttributeLabel('user_province'),'required' => true,'data-msg'=> Yii::t('app', 'validate_province')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_postal_code')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'user_postal_code')->textInput(['placeholder'=> $Users->getAttributeLabel('user_postal_code'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('app', 'txt_register'), ['class' => 'btn btn-primary submit-member','style'=>'width: 100%;']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>