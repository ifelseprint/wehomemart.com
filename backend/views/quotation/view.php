<?php
use yii\helpers\Url;
$style = "
b{font-weight: bold;}
table.viewDataResult { margin-bottom: 15px; }
table.viewDataResult td.col_header { font-weight: bold; width: 100px; }
";
$this->registerCss($style);
?>
<table width="100%">
  <tr>
  	<td width="200" height="25"><img width="200" src="<?=Url::base(true);?>/img/logo.png"></td>
    <td width="500" height="25" align="center"><h2><b>Request quotation</b></h2></td>
    <td width="200" align="right">
    	<b><?=Yii::t('app', 'txt_ref_no')?></b> : <?=$Quotation->quotation_code?>
    	<br/>
    	<b><?=Yii::t('app', 'txt_date')?></b> : <?=date("d/m/Y", strtotime($Quotation->created_date))?>
    </td>
  </tr>
</table>
<!-- <table width="100%">
  <tr>
    <td width="700" colspan="2" height="25"><h2><b>Request quotation</b></h2></td>
  </tr>
</table> -->
<hr style="margin: 10px 0px;">
<h5 class="modal-title">Contact person</h5>
<hr style="margin: 10px 0px;">
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'firstname')?> : </b> <?=$Quotation->quotation_firstname?></td>
    <td width="400"><b><?=Yii::t('app', 'lastname')?> : </b> <?=$Quotation->quotation_lastname?></td>
  </tr>
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'telephone')?> : </b> <?=$Quotation->quotation_telephone?></td>
    <td width="400"><b><?=Yii::t('app', 'email')?> : </b> <?=$Quotation->quotation_email?></td>
  </tr>
</table>

<hr style="margin: 10px 0px;">
<h5 class="modal-title">Quotation address</h5>
<hr style="margin: 10px 0px;">
<?php
if($Quotation->quotation_type==1){
	$quotation_type = Yii::t('app', 'txt_juristic_person');
}else{
	$quotation_type = Yii::t('app', 'txt_company');
}

$project_category_name = 'project_category_name_th';
?>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'txt_type_registration')?> : </b> <?=$quotation_type?></td>
    <td width="400"><b><?=Yii::t('app', 'category')?> : </b> <?=$ProjectCategory->$project_category_name?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'company')?> : </b> <?=$Quotation->quotation_company?></td>
    <td width="400"><b><?=Yii::t('app', 'tax_id')?> : </b> <?=$Quotation->quotation_tax_id?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'address')?> : </b> <?=$Quotation->quotation_address?></td>
    <td width="250"><b><?=Yii::t('app', 'building')?> : </b> <?=$Quotation->quotation_building?></td>
    <td width="150"><b><?=Yii::t('app', 'moo')?> : </b> <?=$Quotation->quotation_moo?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'district')?> : </b> <?=$Quotation->quotation_district?></td>
    <td width="400"><b><?=Yii::t('app', 'amphur')?> : </b> <?=$Quotation->quotation_amphur?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'province')?> : </b> <?=$Quotation->quotation_province?></td>
    <td width="400"><b><?=Yii::t('app', 'postal_code')?> : </b> <?=$Quotation->quotation_postal_code?></td>
  </tr>
</table>

<hr style="margin: 10px 0px;">
<h5 class="modal-title">Product Information</h5>
<hr style="margin: 10px 0px;">
<?php
$project_category_name = 'project_category_name_th';
?>
<table width="100%">
  <tr>
    <td width="700" colspan="2" height="25"><b><?=Yii::t('app', 'category')?> : </b></td>
  </tr>
  <?php
  $product_name = 'product_name_th';
  foreach ($QuotationProductMapping as $key => $data) {
  ?>
  <tr>
    <td width="700" colspan="2" height="25"><?='- '.$data->product->$product_name?></td>
  </tr>
	<?php } ?>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'product_name')?> : </b> <?=$Quotation->quotation_product_name?></td>
    <td width="400"><b><?=Yii::t('app', 'amount')?> : </b> <?=$Quotation->quotation_product_amount?></td>
  </tr>
  <tr>
  	<td colspan="2">
  		<b><?=Yii::t('app', 'product_image')?> : </b> <a target="_blank" href="<?php echo str_replace('/admin', '', Yii::getAlias('@web')).'/uploads/'.$Quotation->quotation_product_image_path.'/'.$Quotation->quotation_product_image; ?>">Download</a>
  	</td>
  </tr>
</table>
<?php
if(!empty($Quotation->quotation_delivery_address)){
	$delivery = Yii::t('app', 'txt_delivery_destination');
	$delivery_box = 'display: block;';
}else{
	$delivery = Yii::t('app', 'txt_pick_up_branch');
	$delivery_box = 'display: none;';
}
?>
<hr style="margin: 10px 0px;">
<h5 class="modal-title">Delivery Information (<?=$delivery?>)</h5>
<hr style="margin: 10px 0px;">
<div style="<?=$delivery_box?>">
	<table width="100%">
	  <tr>
	    <td width="300" height="25"><b><?=Yii::t('app', 'firstname')?> : </b> <?=$Quotation->quotation_delivery_firstname?></td>
	    <td width="400"><b><?=Yii::t('app', 'lastname')?> : </b> <?=$Quotation->quotation_delivery_lastname?></td>
	  </tr>
	</table>
	<table width="100%">
	  <tr>
	    <td width="300" height="25"><b><?=Yii::t('app', 'address')?> : </b> <?=$Quotation->quotation_delivery_address?></td>
	    <td width="250"><b><?=Yii::t('app', 'building')?> : </b> <?=$Quotation->quotation_delivery_building?></td>
	    <td width="150"><b><?=Yii::t('app', 'moo')?> : </b> <?=$Quotation->quotation_delivery_moo?></td>
	  </tr>
	</table>
	<table width="100%">
	  <tr>
	    <td width="300" height="25"><b><?=Yii::t('app', 'district')?> : </b> <?=$Quotation->quotation_delivery_district?></td>
	    <td width="400"><b><?=Yii::t('app', 'amphur')?> : </b> <?=$Quotation->quotation_delivery_amphur?></td>
	  </tr>
	</table>
	<table width="100%">
	  <tr>
	    <td width="300" height="25"><b><?=Yii::t('app', 'province')?> : </b> <?=$Quotation->quotation_delivery_province?></td>
	    <td width="400"><b><?=Yii::t('app', 'postal_code')?> : </b> <?=$Quotation->quotation_delivery_postal_code?></td>
	  </tr>
	</table>
	<table width="100%">
	  <tr>
	    <td width="700" colspan="2" height="25"><b><?=Yii::t('app', 'telephone')?> : </b> <?=$Quotation->quotation_delivery_telephone?></td>
	  </tr>
	</table>
	<table width="100%">
	  <tr>
	    <td width="700" colspan="2" height="25"><b><?=Yii::t('app', 'note')?> : </b> <?=$Quotation->quotation_delivery_note?></td>
	  </tr>
	</table>
</div>