<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\ProductMenu;
use frontend\assets\ProductAsset;
ProductAsset::register($this);
?>
<main class="main">
	<div class="product-posts">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-lg-4 box-left">
    				<div class="proudct-list">
    					<div class="list-header"><?=Yii::$app->translated->get(29);?> </div>
    					<nav class="list-nav">
		                    <ul class="list-menu">
		                        <?= ProductMenu::widget(array('action'=>'link-list-icon')); ?>
		                    </ul><!-- End .mobile-cats-menu -->
		                </nav><!-- End .mobile-cats-nav -->
    				</div>
    			</div>
    			<div class="col-xs-12 col-lg-8 box-right">
    				<div class="product-title">
    					<?=$product['product_name_'.Yii::$app->language];?>
    				</div>
    				<div class="proudct-img">
    					<img src="<?=Url::base(true);?>/uploads/<?=$product['productDetails'][0]['product_detail_image_path'];?>/<?=$product['productDetails'][0]['product_detail_image'];?>">
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="product-detail-posts">
    	<div class="container">
    	    <div class="row">
    			<div class="col-xs-12 col-lg-4 box-left">
    				<div class="product-icon">
    					<i class="fa fa-comments-o"></i>
    				</div>
    			</div>
    			<div class="col-xs-12 col-lg-8 box-right">
    				<div class="product-title">
    					<?=$product['product_name_'.Yii::$app->language];?>
    				</div>
    				<div class="product-detail">
    					<?=$product['productDetails'][0]['product_detail_content_'.Yii::$app->language];?>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</main>