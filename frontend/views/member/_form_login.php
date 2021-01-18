<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php
$form = ActiveForm::begin([
    'action' => ['member/login'],
    'method' => 'post',
    'options' => ['id' => 'formMemberLogin', 'class' => 'form-horizontal','enctype' => 'multipart/form-data' ],
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
    <?= $form->field($Users, 'login_username')->textInput(['placeholder'=> $Users->getAttributeLabel('user_email'), 'required' => true,'data-msg'=> Yii::t('app', 'validate_email')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('login_password')?></label> <span class="field_required">*</span>
    <?= $form->field($Users, 'login_password')->textInput(['placeholder'=> $Users->getAttributeLabel('login_password'),'required' => true,'data-msg'=> Yii::t('app', 'validate_password')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('app', 'txt_login'), ['class' => 'btn btn-primary submit-member-login','style'=>'width: 100%;']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>