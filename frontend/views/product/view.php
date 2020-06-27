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
    					<div class="list-header">รายการสินค้า</div>
    					<nav class="list-nav">
		                    <ul class="list-menu">
		                        <?= ProductMenu::widget(array('action'=>'link-list-icon')); ?>
		                    </ul><!-- End .mobile-cats-menu -->
		                </nav><!-- End .mobile-cats-nav -->
    				</div>
    			</div>
    			<div class="col-xs-12 col-lg-8 box-right">
    				<div class="proudct-img">
    					<img src="<?=Url::base(true);?>/img/show-product.jpg">
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</main>