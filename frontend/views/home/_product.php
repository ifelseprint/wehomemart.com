<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="product-posts">
	<div class="container">
		<div class="block-title">
            <h2 class="title text-center"><?=Yii::$app->translated->get(4);?></h2><!-- End .title-lg text-center -->
           	<p class="text-center"><?=Yii::$app->translated->get(5);?></p>
        </div>
		<div class="row"> 
			<?php
    		foreach ($Product as $value) {
    			$product_name = 'product_name_'.Yii::$app->language;
    		?>
			<div class="col-xs-6 col-lg-3">
			    <div class="product text-left">
			        <figure class="product-media">
			            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_product');?>/<?= Yii::$app->slug->create($value->$product_name);?>-<?=$value->product_id;?>">
			            	<img src="<?=Url::base(true);?>/uploads/<?=$value->product_image_path?>/<?=$value->product_image?>" alt="<?=$product_name?>" title="<?=$product_name;?>">
			            	<img src="<?=Url::base(true);?>/uploads/<?=$value->product_image_hover_path?>/<?=$value->product_image_hover?>" alt="<?=$product_name?>" title="<?=$product_name;?>" class="product-image-hover">
			            </a>
			        </figure><!-- End .product-media -->
			        <div class="product-body">
			            <div class="product-title">
			            	<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_product');?>/<?= Yii::$app->slug->create($value->$product_name);?>-<?=$value->product_id;?>"><?=$value->$product_name?></a>
			            </div><!-- End .product-title -->
			        </div><!-- End .product-body -->
			    </div>
			</div>
			<?php } ?>
			
		</div>
	</div>
</div> <!-- End .product-posts -->