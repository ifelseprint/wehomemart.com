<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="intro-slider-container">
	<div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false,"autoplay":true,"autoplayTimeout":3000,"autoplayHoverPause":true}'>
		<?php if(!empty($Banner->banner_image_1)){ ?>
		<div class="intro-slide">
			<img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_1_path?>/<?=$Banner->banner_image_1?>">
		</div>
		<?php } ?>
		<?php if(!empty($Banner->banner_image_2)){ ?>
		<div class="intro-slide">
			<img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_2_path?>/<?=$Banner->banner_image_2?>">
		</div>
		<?php } ?>
		<?php if(!empty($Banner->banner_image_3)){ ?>
		<div class="intro-slide">
			<img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_3_path?>/<?=$Banner->banner_image_3?>">
		</div>
		<?php } ?>
		<?php if(!empty($Banner->banner_image_4)){ ?>
		<div class="intro-slide">
			<img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_4_path?>/<?=$Banner->banner_image_4?>">
		</div>
		<?php } ?>
	</div><!-- End .owl-carousel owl-simple -->
	<span class="slider-loader text-white"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->