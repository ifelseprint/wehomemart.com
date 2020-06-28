<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul>
	<?php
	foreach ($service as $data) {
		$active = '';
		if(Yii::$app->getRequest()->getQueryParam('slug_id') == $data['service_id']){
			$active = "active";
		}
		?>
	<li class="<?=$active?>"><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_service');?>/<?= Yii::$app->slug->create($data['service_name_'.Yii::$app->language]); ?>-<?=$data['service_id']?>"><i class="fa fa-angle-right"></i> <?= $data['service_name_'.Yii::$app->language]; ?></a></li>
	<?php } ?>
</ul>	