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
    <td width="500" height="25" align="center"><h2><b>Member infomation</b></h2></td>
    <td width="200" align="right">
    	<b><?=Yii::t('app', 'txt_date')?></b> : <?=date("d/m/Y", strtotime($Users->created_date))?>
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
    <td width="300" height="25"><b><?=Yii::t('app', 'firstname')?> : </b> <?=$Users->user_firstname?></td>
    <td width="400"><b><?=Yii::t('app', 'lastname')?> : </b> <?=$Users->user_lastname?></td>
  </tr>
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'telephone')?> : </b> <?=$Users->user_telephone?></td>
    <td width="400"><b><?=Yii::t('app', 'email')?> : </b> <?=$Users->user_email?></td>
  </tr>
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'age')?> : </b> <?=$Users->user_age?></td>
    <td width="400"><b><?=Yii::t('app', 'career')?> : </b> <?=$Users->user_career?></td>
  </tr>
</table>
<?php if ($Users->user_customer == 1) { ?>
<table width="100%">
  <tr>
    <td height="25">
      <span class="badge badge-lg badge-success"><?= Yii::t('app', 'checked_customer'); ?></span >
    </td>
  </tr>
</table>
<?php } ?>
<hr style="margin: 10px 0px;">
<h5 class="modal-title">Member address</h5>
<hr style="margin: 10px 0px;">
<table width="100%">
  <tr>
    <td height="25"><b><?=Yii::t('app', 'location')?> : </b> <?=$Users->user_location?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'address')?> : </b> <?=$Users->user_address?></td>
    <td width="250"><b><?=Yii::t('app', 'building')?> : </b> <?=$Users->user_building?></td>
    <td width="150"><b><?=Yii::t('app', 'moo')?> : </b> <?=$Users->user_moo?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'district')?> : </b> <?=$Users->user_district?></td>
    <td width="400"><b><?=Yii::t('app', 'amphur')?> : </b> <?=$Users->user_amphur?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'province')?> : </b> <?=$Users->user_province?></td>
    <td width="400"><b><?=Yii::t('app', 'postal_code')?> : </b> <?=$Users->user_postal_code?></td>
  </tr>
</table>

<hr style="margin: 10px 0px;">
<h5 class="modal-title">Member address Tax</h5>
<hr style="margin: 10px 0px;">
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'address')?> : </b> <?=$Users->tax_address?></td>
    <td width="250"><b><?=Yii::t('app', 'building')?> : </b> <?=$Users->tax_building?></td>
    <td width="150"><b><?=Yii::t('app', 'moo')?> : </b> <?=$Users->tax_moo?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'district')?> : </b> <?=$Users->tax_district?></td>
    <td width="400"><b><?=Yii::t('app', 'amphur')?> : </b> <?=$Users->tax_amphur?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="300" height="25"><b><?=Yii::t('app', 'province')?> : </b> <?=$Users->tax_province?></td>
    <td width="400"><b><?=Yii::t('app', 'postal_code')?> : </b> <?=$Users->tax_postal_code?></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td height="25"><b><?=Yii::t('app', 'tax_id')?> : </b> <?=$Users->tax_id?></td>
  </tr>
</table>