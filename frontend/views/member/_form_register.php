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
    <?= $form->field($Users, 'login_username')->textInput(['placeholder'=> $Users->getAttributeLabel('user_email'), 'required' => true,'pattern'=>'[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$','data-msg'=> Yii::t('app', 'validate_email')])?>
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
    <label><?=$Users->getAttributeLabel('user_age')?></label>
    <?= $form->field($Users, 'user_age')->textInput(['placeholder'=> $Users->getAttributeLabel('user_age'),'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]+','data-msg'=> Yii::t('app', 'validate_age')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_career')?></label>
    <?php
    $dataCareer=[
      Yii::t('app', 'career_1') => Yii::t('app', 'career_1'),
      Yii::t('app', 'career_2') => Yii::t('app', 'career_2'),
      Yii::t('app', 'career_3') => Yii::t('app', 'career_3'),
      Yii::t('app', 'career_4') => Yii::t('app', 'career_4'),
      Yii::t('app', 'career_5') => Yii::t('app', 'career_5'),
      Yii::t('app', 'career_6') => Yii::t('app', 'career_6'),
      Yii::t('app', 'career_7') => Yii::t('app', 'career_7'),
      Yii::t('app', 'career_8') => Yii::t('app', 'career_8'),
      Yii::t('app', 'career_9') => Yii::t('app', 'career_9')
    ];
    ?>
    <?= $form->field($Users, 'user_career')->dropDownList($dataCareer,['class'=>'form-control form-control-sm select2']); ?>
  </div>
</div>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row">
  <div class="col-sm-4">
    <label><?=$Users->getAttributeLabel('user_address')?></label>
    <?= $form->field($Users, 'user_address')->textInput(['placeholder'=> $Users->getAttributeLabel('user_address'),'data-msg'=> Yii::t('app', 'validate_address')])?>
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
    <label><?=$Users->getAttributeLabel('user_province')?></label>

    <?= $form->field($Users, 'user_province')->dropDownList($dataProvinces,['prompt'=> ': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2','id' => 'user_province', 'data-msg'=> Yii::t('app', 'validate_province'), 'onchange'=>'
      var value = $(this).val();
      $("#user_postal_code").val("");
      $("select.list").find("option:not(:first-child)").remove();

      $.get("'.Url::toRoute('member/amphur-list').'",{
        id: value
      }).done(function(result){

        $("#user_amphur").find("option:not(:first-child)").remove();
        $("#user_district").find("option:not(:first-child)").remove();

        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#user_amphur");
        });
      });
    ']); ?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_amphur')?></label>
    <?= $form->field($Users, 'user_amphur')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list','id' => 'user_amphur', 'data-msg'=> Yii::t('app', 'validate_amphur'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('member/district-list').'",{
        id: value
      }).done(function(result){
        $("#user_district").find("option:not(:first-child)").remove();
        $("#user_postal_code").val("");
        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#user_district");
        });

      });
    ']); ?>

  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_district')?></label>
    <?= $form->field($Users, 'user_district')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list','id' => 'user_district', 'data-msg'=> Yii::t('app', 'validate_district'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('member/zipcode-list').'",{
        id: value
      }).done(function(result){
        $("#user_postal_code").val(result.data[0].zip_code);
      });
    ']); ?>
  </div>
  <div class="col-sm-6">
    <label><?=$Users->getAttributeLabel('user_postal_code')?></label>
    <?= $form->field($Users, 'user_postal_code')->textInput(['placeholder'=> $Users->getAttributeLabel('user_postal_code'),'id'=>'user_postal_code','onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)', 'readonly'=> true,'pattern' => '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('user_address_tax')?></label>
    <?= Html::radio('user_address_tax', true, ['value'=>1,'class'=> 'checked_tax','label' => Yii::t('app', 'txt_same_address')]) ?>
    <?= Html::radio('user_address_tax', false, ['value'=>2,'class'=> 'checked_tax','label' => Yii::t('app', 'txt_same_address_other')]) ?>
  </div>
</div>
<div id="box-tax" style="display: none;">
  <div class="form-group-sm row">
    <div class="col-sm-4">
      <label><?=$Users->getAttributeLabel('tax_address')?></label> <span class="field_required">*</span>
      <?= $form->field($Users, 'tax_address')->textInput(['placeholder'=> $Users->getAttributeLabel('tax_address'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_address')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Users->getAttributeLabel('tax_building')?></label>
      <?= $form->field($Users, 'tax_building')->textInput(['placeholder'=> $Users->getAttributeLabel('tax_building')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Users->getAttributeLabel('tax_moo')?></label>
      <?= $form->field($Users, 'tax_moo')->textInput(['placeholder'=> $Users->getAttributeLabel('tax_moo')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Users->getAttributeLabel('tax_province')?></label> <span class="field_required">*</span>
      <?= $form->field($Users, 'tax_province')->dropDownList($dataProvinces,['prompt'=> ': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 required','id' => 'tax_province', 'data-msg'=> Yii::t('app', 'validate_province'), 'onchange'=>'
      var value = $(this).val();
      $("#tax_postal_code").val("");

      $.get("'.Url::toRoute('member/amphur-list').'",{
        id: value
      }).done(function(result){

        $("#tax_amphur").find("option:not(:first-child)").remove();
        $("#tax_district").find("option:not(:first-child)").remove();

        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#tax_amphur");
        });
      });
    ']); ?>

    </div>
    <div class="col-sm-6">
      <label><?=$Users->getAttributeLabel('tax_amphur')?></label> <span class="field_required">*</span>
      <?= $form->field($Users, 'tax_amphur')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list required','id' => 'tax_amphur', 'data-msg'=> Yii::t('app', 'validate_amphur'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('member/district-list').'",{
        id: value
      }).done(function(result){
        $("#tax_district").find("option:not(:first-child)").remove();
        $("#tax_postal_code").val("");
        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#tax_district");
        });

      });
    ']); ?>

    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Users->getAttributeLabel('tax_district')?></label> <span class="field_required">*</span>
      <?= $form->field($Users, 'tax_district')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list required','id' => 'tax_district','data-msg'=> Yii::t('app', 'validate_district'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('member/zipcode-list').'",{
        id: value
      }).done(function(result){
        $("#tax_postal_code").val(result.data[0].zip_code);
      });
    ']); ?>
    </div>
    <div class="col-sm-6">
      <label><?=$Users->getAttributeLabel('tax_postal_code')?></label> <span class="field_required">*</span>
      <?= $form->field($Users, 'tax_postal_code')->textInput(['placeholder'=> $Users->getAttributeLabel('tax_postal_code'),'id'=>'tax_postal_code','class'=>'form-control','readonly'=>true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
    </div>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-12">
    <label><?=$Users->getAttributeLabel('tax_id')?></label>
    <?= $form->field($Users, 'tax_id')->textInput(['placeholder'=> $Users->getAttributeLabel('tax_id'),'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','data-msg'=> Yii::t('app', 'validate_tax_id')])?>
  </div>
</div>
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
    <?php
    // $Users->user_customer = 1;
    ?>
    <?= $form->field($Users, "user_customer")->checkbox(['value' => "1",'label' => Yii::t('app', 'checked_customer'),'data-msg'=>'คุณยังไม่ได้เลือกยอมรับข้อนี้']); ?>
  </div>
</div>

<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('app', 'txt_register'), ['class' => 'btn btn-primary submit-member','style'=>'width: 100%;']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
<?php
$script = <<<JS
  $("document").ready(function(){
    $('.select2').select2();
  });
JS;
$this->registerJs($script);
?>