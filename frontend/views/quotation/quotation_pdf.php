<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<table width="700">
  <tr>
  	<td width="200" height="25"><img width="200" src="<?=Url::base(true);?>/img/logo.png"></td>
    <td width="300" height="25" align="center"><h2><b>Request quotation</b></h2></td>
    <td width="200" align="right">
    	<b><?=Yii::t('app', 'txt_ref_no')?></b> : <?=$Quotation->quotation_code?>
    	<br/><br/>
    	<b><?=Yii::t('app', 'txt_date')?></b> : <?=date("d/m/Y", strtotime($Quotation->created_date))?>
    </td>
  </tr>
</table>
<br/><br/>
<hr style="margin: 10px 0px;">
<h5 class="modal-title">Contact person</h5>
<hr style="margin: 10px 0px;">
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_firstname')?> : </b> <?=$Quotation->quotation_firstname?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_lastname')?> : </b> <?=$Quotation->quotation_lastname?></td>
  </tr>
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_telephone')?> : </b> <?=$Quotation->quotation_telephone?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_email')?> : </b> <?=$Quotation->quotation_email?></td>
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

$project_category_name = 'project_category_name_'.Yii::$app->language;
?>
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_type')?> : </b> <?=$quotation_type?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_project_category_id')?> : </b> <?=$ProjectCategory->$project_category_name?></td>
  </tr>
</table>
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_company')?> : </b> <?=$Quotation->quotation_company?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_tax_id')?> : </b> <?=$Quotation->quotation_tax_id?></td>
  </tr>
</table>
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_address')?> : </b> <?=$Quotation->quotation_address?></td>
    <td width="250"><b><?=$Quotation->getAttributeLabel('quotation_building')?> : </b> <?=$Quotation->quotation_building?></td>
    <td width="150"><b><?=$Quotation->getAttributeLabel('quotation_moo')?> : </b> <?=$Quotation->quotation_moo?></td>
  </tr>
</table>
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_district')?> : </b> <?=$Quotation->quotation_district?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_amphur')?> : </b> <?=$Quotation->quotation_amphur?></td>
  </tr>
</table>
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_province')?> : </b> <?=$Quotation->quotation_province?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_postal_code')?> : </b> <?=$Quotation->quotation_postal_code?></td>
  </tr>
</table>

<hr style="margin: 10px 0px;">
<h5 class="modal-title">Product Information</h5>
<hr style="margin: 10px 0px;">
<?php
$project_category_name = 'project_category_name_'.Yii::$app->language;
?>
<table width="700">
  <tr>
    <td width="700" colspan="2" height="25"><b><?=$Quotation->getAttributeLabel('quotation_project_category_id')?> : </b></td>
  </tr>
  <?php
  $product_name = 'product_name_'.Yii::$app->language;
  foreach ($QuotationProductMapping as $key => $data) {
  ?>
  <tr>
    <td width="700" colspan="2" height="25"><?='- '.$data->product->$product_name?></td>
  </tr>
	<?php } ?>
</table>
<table width="700">
  <tr>
    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_product_name')?> : </b> <?=$Quotation->quotation_product_name?></td>
    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_product_amount')?> : </b> <?=$Quotation->quotation_product_amount?></td>
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
	<table width="700">
	  <tr>
	    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_firstname')?> : </b> <?=$Quotation->quotation_delivery_firstname?></td>
	    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_lastname')?> : </b> <?=$Quotation->quotation_delivery_lastname?></td>
	  </tr>
	</table>
	<table width="700">
	  <tr>
	    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_address')?> : </b> <?=$Quotation->quotation_delivery_address?></td>
	    <td width="250"><b><?=$Quotation->getAttributeLabel('quotation_building')?> : </b> <?=$Quotation->quotation_delivery_building?></td>
	    <td width="150"><b><?=$Quotation->getAttributeLabel('quotation_moo')?> : </b> <?=$Quotation->quotation_delivery_moo?></td>
	  </tr>
	</table>
	<table width="700">
	  <tr>
	    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_district')?> : </b> <?=$Quotation->quotation_delivery_district?></td>
	    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_amphur')?> : </b> <?=$Quotation->quotation_delivery_amphur?></td>
	  </tr>
	</table>
	<table width="700">
	  <tr>
	    <td width="300" height="25"><b><?=$Quotation->getAttributeLabel('quotation_province')?> : </b> <?=$Quotation->quotation_delivery_province?></td>
	    <td width="400"><b><?=$Quotation->getAttributeLabel('quotation_postal_code')?> : </b> <?=$Quotation->quotation_delivery_postal_code?></td>
	  </tr>
	</table>
	<table width="700">
	  <tr>
	    <td width="700" colspan="2" height="25"><b><?=$Quotation->getAttributeLabel('quotation_telephone')?> : </b> <?=$Quotation->quotation_delivery_telephone?></td>
	  </tr>
	</table>
	<table width="700">
	  <tr>
	    <td width="700" colspan="2" height="25"><b><?=$Quotation->getAttributeLabel('quotation_delivery_note')?> : </b> <?=$Quotation->quotation_delivery_note?></td>
	  </tr>
	</table>
</div>
<div class="page-break"></div>
<img style="max-width: 100%" src="<?=Url::base(true);?>/uploads/<?=$Quotation->quotation_product_image_path?>/<?=$Quotation->quotation_product_image?>">