<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul>
	<?php
	foreach ($product as $data) {
	?>
	<li><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_product');?>/<?= str_replace(" ","-",$data['product_name_'.Yii::$app->language]); ?>"><i class="fa fa-angle-right"></i> <?= $data['product_name_'.Yii::$app->language]; ?></a></li>
	<?php } ?>
</ul>	