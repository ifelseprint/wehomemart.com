<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\HomeAsset;
HomeAsset::register($this);
?>
<main class="main">
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false,"autoplay":true,"autoplayTimeout":3000,"autoplayHoverPause":true}'>

        	<div class="intro-slide"><img src="<?=Url::base(true);?>/img/banner.jpg"></div>
        	<div class="intro-slide"><img src="<?=Url::base(true);?>/img/banner-mock.jpg"></div>


            
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <?= $this->render('_promotion', ['Promotion'=> $Promotion]); ?>

    <?= $this->render('_product', ['Product'=> $Product]); ?>

	<?= $this->render('_service', ['Service'=> $Service]); ?>

    <?= $this->render('_article', ['Article'=> $Article]); ?>
   
</main><!-- End .main -->
