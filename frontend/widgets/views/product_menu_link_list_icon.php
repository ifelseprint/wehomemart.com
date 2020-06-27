<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php

foreach ($product as $data) {
	
	$active = '';
	if(Yii::$app->getRequest()->getQueryParam('slug') == str_replace(" ","-",$data['product_name_'.Yii::$app->language])){
		$active = "active";
	}
?>
<li class="<?=$active?>"><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_product');?>/<?= str_replace(" ","-",$data['product_name_'.Yii::$app->language]); ?>"><img src="<?=Url::base(true);?>/uploads/<?= $data['product_icon'];?>"> <?= $data['product_name_'.Yii::$app->language]; ?></a></li>
<?php } ?>