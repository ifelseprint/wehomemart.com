<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ServiceAsset;
ServiceAsset::register($this);
?>
<main class="main">
	<div class="service-posts">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-lg-4 box-left">
    				<div class="service-list">
    					<div class="list-header">รายการสินค้า </div>
    				</div>
    			</div>
    			<div class="col-xs-12 col-lg-8 box-right">
    				<div class="service-title">
    					<?=$service['service_name_'.Yii::$app->language];?>
    				</div>
    				<div class="service-img">
    					<img src="<?=Url::base(true);?>/uploads/<?=$service['serviceDetails'][0]['service_detail_image'];?>">
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</main>