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
    <label><?=$Quotation->getAttributeLabel('quotation_type')?></label>
    <?= $form->field($Quotation, 'quotation_type')->radioList( [1 => Yii::t('app', 'txt_juristic_person'), 2 => Yii::t('app', 'txt_company')], ['unselect' => null]); ?>
  </div>
  <div class="col-sm-6">
    <?php
    $Quotation->quotation_project_category_id = 1;
    ?>
    <label><?=$Quotation->getAttributeLabel('quotation_project_category_id')?></label>
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
    <label><?=$Quotation->getAttributeLabel('quotation_province')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_province')->dropDownList($dataProvinces,['prompt'=> ': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2','id' => 'quotation_province','required' => true, 'data-msg'=> Yii::t('app', 'validate_province'), 'onchange'=>'
      var value = $(this).val();
      $("#quotation_postal_code").val("");

      $.get("'.Url::toRoute('quotation/amphur-list').'",{
        id: value
      }).done(function(result){

        $("#quotation_amphur").find("option:not(:first-child)").remove();
        $("#quotation_district").find("option:not(:first-child)").remove();

        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#quotation_amphur");
        });
      });
    ']); ?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_amphur')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_amphur')->dropDownList($dataAmphures,['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list','id' => 'quotation_amphur','required' => true, 'data-msg'=> Yii::t('app', 'validate_amphur'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('quotation/district-list').'",{
        id: value
      }).done(function(result){
        $("#quotation_district").find("option:not(:first-child)").remove();
        $("#quotation_postal_code").val("");
        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#quotation_district");
        });

      });
    ']); ?>
  </div>
</div>
<div class="form-group-sm row">
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_district')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_district')->dropDownList($dataDistricts,['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list','id' => 'quotation_district','required' => true, 'data-msg'=> Yii::t('app', 'validate_district'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('quotation/zipcode-list').'",{
        id: value
      }).done(function(result){
        $("#quotation_postal_code").val(result.data[0].zip_code);
      });
    ']); ?>
  </div>
  <div class="col-sm-6">
    <label><?=$Quotation->getAttributeLabel('quotation_postal_code')?></label> <span class="field_required">*</span>
    <?= $form->field($Quotation, 'quotation_postal_code')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_postal_code'),'id'=>'quotation_postal_code','readonly' => true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
  </div>
</div>

<h5 class="modal-title">Product Information</h5>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
    <label><?=$Quotation->getAttributeLabel('quotation_project_category_id')?></label>
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
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
  <?= $form->field($Quotation, 'quotation_product_file')->fileInput(['pattern' => '^.+\.(jpg|png|jpeg)$','data-msg'=>Yii::t('app', 'validate_product_file')])?>
  </div>
</div>
<hr style="margin: 2rem auto 2.5rem;">
<?php
for($product_num = 1; $product_num <= 5;$product_num++){
?>
<div class="form-group-sm row">
  <div class="col-sm-1">
    <div style="margin-top: 30px;"> No. <?=$product_num?> </div>
  </div>
  <div class="col-sm-4">
    <label><?=$Quotation->getAttributeLabel('quotation_product_name')?></label>
    <?= $form->field($Quotation, 'quotation_product_name['.$product_num.']')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_product_name'),'data-msg'=>Yii::t('app', 'validate_product_name')])?>
  </div>
  <div class="col-sm-2">
    <label><?=$Quotation->getAttributeLabel('quotation_product_amount')?></label>
    <?= $form->field($Quotation, 'quotation_product_amount['.$product_num.']')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_product_amount'),'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '[0-9]{1,20}','data-msg'=>Yii::t('app', 'validate_amount')])?>
  </div>
  <div class="col-sm-2">
    <label><?=$Quotation->getAttributeLabel('quotation_product_unit')?></label>
    <?php
    $dataUnit = ['ชิ้น'=>'ชิ้น','แพค'=>'แพค','ลัง'=>'ลัง'];
    ?>
    <?= $form->field($Quotation, 'quotation_product_unit['.$product_num.']')->dropDownList($dataUnit,['class'=>'form-control form-control-sm select2','id' => 'PREFIX','required'=> true,'data-msg'=>'คุณยังไม่ได้ระบุคำนำหน้าชื่อ']); ?>
  </div>
  <div class="col-sm-3">
    <label><?=$Quotation->getAttributeLabel('quotation_product_image')?></label>
    <?= $form->field($Quotation, 'quotation_product_image_'.$product_num)->fileInput(['pattern' => '^.+\.(jpg|png|jpeg)$','data-msg'=>Yii::t('app', 'validate_product_image')])?>
  </div>
</div>
<?php } ?>

<?php
for($product_num = 6; $product_num <= 15;$product_num++){
?>
<div class="form-group-sm row product_more_box" style="display: none;">
  <div class="col-sm-1">
    <div style="margin-top: 30px;"> No. <?=$product_num?> </div>
  </div>
  <div class="col-sm-4">
    <label><?=$Quotation->getAttributeLabel('quotation_product_name')?></label>
    <?= $form->field($Quotation, 'quotation_product_name['.$product_num.']')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_product_name'),'data-msg'=>Yii::t('app', 'validate_product_name')])?>
  </div>
  <div class="col-sm-2">
    <label><?=$Quotation->getAttributeLabel('quotation_product_amount')?></label>
    <?= $form->field($Quotation, 'quotation_product_amount['.$product_num.']')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_product_amount'),'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '[0-9]{1,20}','data-msg'=>Yii::t('app', 'validate_amount')])?>
  </div>
  <div class="col-sm-2">
    <label><?=$Quotation->getAttributeLabel('quotation_product_unit')?></label>
    <?php
    $dataUnit = ['ชิ้น'=>'ชิ้น','แพค'=>'แพค','ลัง'=>'ลัง'];
    ?>
    <?= $form->field($Quotation, 'quotation_product_unit['.$product_num.']')->dropDownList($dataUnit,['class'=>'form-control form-control-sm select2','id' => 'PREFIX','required'=> true,'data-msg'=>'คุณยังไม่ได้ระบุคำนำหน้าชื่อ']); ?>
  </div>
  <div class="col-sm-3">
    <label><?=$Quotation->getAttributeLabel('quotation_product_image')?></label>
    <?= $form->field($Quotation, 'quotation_product_image_'.$product_num)->fileInput(['pattern' => '^.+\.(jpg|png|jpeg)$','data-msg'=>Yii::t('app', 'validate_product_image')])?>
  </div>
</div>
<?php } ?>
<div class="show-more-product" style="text-align: center;">
  <a href="#" class="btn btn-primary"><?=Yii::t('app', 'txt_btn_upload_more')?></a>
</div>
<hr style="margin: 2rem auto 2.5rem;">

<h5 class="modal-title">Delivery Information</h5>
<hr style="margin: 10px 0px;">
<div class="form-group-sm row" style="padding-bottom: 10px;">
  <div class="col-sm-12">
    <?= Html::radio('quotation_delivery_type', true, ['value'=>1,'class'=> 'checked_delivery','label' => Yii::t('app', 'txt_pick_up_branch')]) ?>
    <?= Html::radio('quotation_delivery_type', false, ['value'=>2,'class'=> 'checked_delivery','label' => Yii::t('app', 'txt_delivery_destination')]) ?>
    <?= Html::radio('quotation_delivery_type', false, ['value'=>3,'class'=> 'checked_delivery','label' => Yii::t('app', 'txt_same_address_other')]) ?>
  </div>
</div>
<div id="box-delivery-tax" style="display: none;">
  <div class="form-group-sm row">
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_address')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_tax_address')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_address'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_address')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_building')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_tax_building')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_building')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_moo')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_tax_moo')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_moo')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_province')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_tax_province')->dropDownList($dataProvinces,['prompt'=> ': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 required','id' => 'quotation_delivery_tax_province', 'data-msg'=> Yii::t('app', 'validate_province'), 'onchange'=>'
      var value = $(this).val();
      $("#quotation_delivery_tax_postal_code").val("");
      $.get("'.Url::toRoute('quotation/amphur-list').'",{
        id: value
      }).done(function(result){

        $("#quotation_delivery_tax_amphur").find("option:not(:first-child)").remove();
        $("#quotation_delivery_tax_district").find("option:not(:first-child)").remove();

        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#quotation_delivery_tax_amphur");
        });

        $("#quotation_delivery_tax_amphur").val('.$Quotation->quotation_delivery_tax_amphur.').trigger("change");
      });
    ']); ?>

    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_amphur')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_tax_amphur')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list required','id' => 'quotation_delivery_tax_amphur', 'data-msg'=> Yii::t('app', 'validate_amphur'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('quotation/district-list').'",{
        id: value
      }).done(function(result){
        $("#quotation_delivery_tax_district").find("option:not(:first-child)").remove();
        $("#quotation_delivery_tax_postal_code").val("");
        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#quotation_delivery_tax_district");
        });

        $("#quotation_delivery_tax_district").val('.$Quotation->quotation_delivery_tax_district.').trigger("change");
      });
    ']); ?>

    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_district')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_tax_district')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list required','id' => 'quotation_delivery_tax_district','data-msg'=> Yii::t('app', 'validate_district'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('quotation/zipcode-list').'",{
        id: value
      }).done(function(result){
        $("#quotation_delivery_tax_postal_code").val(result.data[0].zip_code);
      });
    ']); ?>
    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_postal_code')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_tax_postal_code')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_postal_code'),'id'=>'quotation_delivery_tax_postal_code','class'=>'form-control','readonly'=>true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
    </div>
  </div>
</div>

<div id="box-delivery-other" style="display: none;">
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_firstname')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_firstname')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_firstname'), 'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_firstname')])?>
    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_lastname')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_lastname')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_lastname'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_lastname')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_address')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_address')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_address'),'class'=>'form-control required','data-msg'=> Yii::t('app', 'validate_address')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_building')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_other_building')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_building')])?>
    </div>
    <div class="col-sm-4">
      <label><?=$Quotation->getAttributeLabel('quotation_moo')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_other_moo')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_moo')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_province')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_province')->dropDownList($dataProvinces,['prompt'=> ': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 required','id' => 'quotation_delivery_other_province', 'data-msg'=> Yii::t('app', 'validate_province'), 'onchange'=>'
      var value = $(this).val();
      $("#quotation_delivery_other_postal_code").val("");

      $.get("'.Url::toRoute('quotation/amphur-list').'",{
        id: value
      }).done(function(result){

        $("#quotation_delivery_other_amphur").find("option:not(:first-child)").remove();
        $("#quotation_delivery_other_district").find("option:not(:first-child)").remove();

        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#quotation_delivery_other_amphur");
        });
      });
    ']); ?>

    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_amphur')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_amphur')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list required','id' => 'quotation_delivery_other_amphur', 'data-msg'=> Yii::t('app', 'validate_amphur'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('quotation/district-list').'",{
        id: value
      }).done(function(result){
        $("#quotation_delivery_other_district").find("option:not(:first-child)").remove();
        $("#quotation_delivery_other_postal_code").val("");
        $.each(result.data, function(k, v) {
          $("<option>").val(v.id).text(v.name_'.Yii::$app->language.').appendTo("#quotation_delivery_other_district");
        });

      });
    ']); ?>

    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_district')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_district')->dropDownList([],['prompt'=>': : : '.Yii::t('app', 'txt_select').' : : :','class'=>'form-control form-control-sm select2 list required','id' => 'quotation_delivery_other_district','data-msg'=> Yii::t('app', 'validate_district'), 'onchange'=>'
      var value = $(this).val();
      $.get("'.Url::toRoute('quotation/zipcode-list').'",{
        id: value
      }).done(function(result){
        $("#quotation_delivery_other_postal_code").val(result.data[0].zip_code);
      });
    ']); ?>
    </div>
    <div class="col-sm-6">
      <label><?=$Quotation->getAttributeLabel('quotation_postal_code')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_postal_code')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_postal_code'),'id'=>'quotation_delivery_other_postal_code','class'=>'form-control','readonly'=>true,'onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern' => '[0-9]{5}','data-msg'=>Yii::t('app', 'validate_postal_code')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-12">
      <label><?=$Quotation->getAttributeLabel('quotation_telephone')?></label> <span class="field_required">*</span>
      <?= $form->field($Quotation, 'quotation_delivery_other_telephone')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_telephone'),'class'=>'form-control required','onkeypress' =>'return appWEHOME.App.OnlyNumbers(event)','pattern'=> '^0[0-9]{8,10}','maxlength' =>'10','data-msg'=> Yii::t('app', 'validate_telephone')])?>
    </div>
  </div>
  <div class="form-group-sm row">
    <div class="col-sm-12">
      <label><?=$Quotation->getAttributeLabel('quotation_delivery_other_note')?></label>
      <?= $form->field($Quotation, 'quotation_delivery_other_note')->textInput(['placeholder'=> $Quotation->getAttributeLabel('quotation_delivery_other_note')])?>
    </div>
  </div>
</div>

<div class="form-group-sm row">
  <div class="col-sm-12">
    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> '.Yii::t('app', 'txt_request_quotation'), ['class' => 'btn btn-primary submit-quotation','style'=>'width: 100%;']) ?>
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