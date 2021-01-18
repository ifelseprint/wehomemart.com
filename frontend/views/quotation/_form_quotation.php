<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php
$action = Yii::$app->controller->action->id;

$form = ActiveForm::begin([
    'action' => ["quotation/index/{$id}"],
    'method' => 'post',
    'options' => ['id' => 'formQuotation', 'class' => 'form-horizontal','enctype' => 'multipart/form-data' ],
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

<h5 class="modal-title">Contact person</h5>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_firstname')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_firstname')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_firstname'), 'required' => true,'data-msg'=> Yii::t('app', 'validate_firstname')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_lastname')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_lastname')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_lastname'), 'required' => true,'data-msg'=> Yii::t('app', 'validate_lastname')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_telephone')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_telephone')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_telephone'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '^0[0-9]{8,10}','maxlength' =>'10','data-msg'=> Yii::t('app', 'validate_telephone')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_email')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_email')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_email'),'required' => true,'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$','data-msg'=> Yii::t('app', 'validate_email')])?>
  </div>
</div>

<h5 class="modal-title">Quotation address</h5>
<hr style="margin: 10px 0px;">

<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-6">
    <?php
    $Quotation->quotation_type = 1;
    ?>
    <label><?=$Quotation->getAttributeLabel('quotation_type')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_type')->radioList( [1 => Yii::t('app', 'txt_juristic_person'), 2 => Yii::t('app', 'txt_company')], ['unselect' => null]); ?>
  </div>
  <div class="col-sm-6">
    <?php
    $Quotation->quotation_project_category_id = 1;
    ?>
    <label><?=$Quotation->getAttributeLabel('quotation_project_category_id')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_project_category_id')->radioList( $dataProjectCategory, ['unselect' => null]); ?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_company')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_company')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_company'),'required' => true,'data-msg'=> Yii::t('app', 'validate_company')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_tax_id')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_tax_id')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_tax_id'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','data-msg'=> Yii::t('app', 'validate_tax_id')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-4">
    <label><?=$Quotation->getAttributeLabel('quotation_address')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_address')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_address'),'required' => true,'data-msg'=> Yii::t('app', 'validate_address')])?>
  </div>
  <div class="col-sm-4">
    <label><?=$Quotation->getAttributeLabel('quotation_building')?></label>
    <?= $form->field($Quotation, 'quotation_building')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_building')])?>
  </div>
  <div class="col-sm-4">
    <label><?=$Quotation->getAttributeLabel('quotation_moo')?></label>
    <?= $form->field($Quotation, 'quotation_moo')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_moo')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_district')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_district')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_district'),'required' => true,'data-msg'=> Yii::t('app', 'validate_district')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_amphur')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_amphur')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_amphur'),'required' => true,'data-msg'=> Yii::t('app', 'validate_amphur')])?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_province')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_province')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_province'),'required' => true,'data-msg'=> Yii::t('app', 'validate_province')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_postal_code')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_postal_code')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_postal_code'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
  </div>
</div>

<h5 class="modal-title">Product Information</h5>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
    <label><?=$Quotation->getAttributeLabel('quotation_project_category_id')?></label> <span class="field_required">*</span>
    <div class="row">
    <?php
    $Quotation->quotation_product[] = $id;
    ?>
    <?=$form->field($Quotation, 'quotation_product')->checkboxList($dataProduct,[
        'item' => function($index, $label, $name, $checked, $value) {
            $checked = $checked ? 'checked' : '';
            return "<label class='checkbox col-sm-6' style='font-weight: normal;'><input type='checkbox' {$checked} name='{$name}' value='{$value}'> {$label}</label>";
        }
    ])
    ?>
    </div>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_product_name')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_product_name')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_product_name'),'required' => true,'data-msg'=>Yii::t('app', 'validate_product_name')])?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_product_amount')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_product_amount')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_product_amount'),'required' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '[0-9]{1,20}','data-msg'=>Yii::t('app', 'validate_amount')])?>
  </div>
</div>
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
    <label><?=$Quotation->getAttributeLabel('quotation_product_image')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_product_image')->fileInput(['required'=> true,'pattern' => '^.+\.(jpg|png|jpeg)$','data-msg'=>Yii::t('app', 'validate_product_image')])?>
  </div>
</div>

<h5 class="modal-title">Delivery Information</h5>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
    <?= Html::radio('delivery', true, ['value'=>1,'class'=> 'checked_delivery','label' => Yii::t('app', 'txt_pick_up_branch')]) ?>
    <?= Html::radio('delivery', false, ['value'=>2,'class'=> 'checked_delivery','label' => Yii::t('app', 'txt_delivery_destination')]) ?>
  </div>
</div>
<div id="box-delivery" style="display: none;">
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_firstname')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_firstname')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_firstname'), 'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_firstname')])?>
    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_lastname')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_lastname')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_lastname'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_lastname')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_address')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_address')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_address'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_address')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_building')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_building')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_building')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_moo')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_moo')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_moo')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_district')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_district')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_district'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_district')])?>
    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_amphur')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_amphur')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_amphur'),'class'=>'form-control required', 'data-msg'=> Yii::t('app', 'validate_amphur')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_province')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_province')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_province'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_province')])?>
    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_postal_code')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_postal_code')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_postal_code'),'class'=>'form-control required','onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-12">
      <label><?=$Quotation->getAttributeLabel('quotation_telephone')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_telephone')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_telephone'),'class'=>'form-control required','onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '^0[0-9]{8,10}','maxlength' =>'10','data-msg'=> Yii::t('app', 'validate_telephone')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-12">
      <label><?=$Quotation->getAttributeLabel('quotation_delivery_note')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_note')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_delivery_note')])?>
    </div>
  </div>
</div>

<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('app', 'txt_request_quotation'), ['class' => 'btn btn-primary submit-quotation','style'=>'width: 100%;']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>