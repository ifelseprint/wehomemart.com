<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ServiceAsset;
ServiceAsset::register($this);
?>

<?php
$service_name = 'service_name_'.Yii::$app->language;
$service_detail_content = 'service_detail_content_'.Yii::$app->language;
?>
<div style="padding: 0px 20px 20px 20px;">
	<div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": true,"autoplay":true,"autoplayTimeout":3000,"lazyLoad":true,"autoplayHoverPause":true}' style="height: 400px;    overflow: hidden;">
        <?php if(!empty($Banner->banner_image_1)){?>
	    <div class="intro-slide"><img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_1_path?>/<?=$Banner->banner_image_1?>" style="height: 400px;"></div>
        <?php } ?>
        <?php if(!empty($Banner->banner_image_2)){?>
        <div class="intro-slide"><img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_2_path?>/<?=$Banner->banner_image_2?>" style="height: 400px;"></div>
        <?php } ?>
        <?php if(!empty($Banner->banner_image_3)){?>
        <div class="intro-slide"><img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_3_path?>/<?=$Banner->banner_image_3?>" style="height: 400px;"></div>
        <?php } ?>
        <?php if(!empty($Banner->banner_image_4)){?>
        <div class="intro-slide"><img src="<?=Url::base(true);?>/uploads/<?=$Banner->banner_image_4_path?>/<?=$Banner->banner_image_4?>" style="height: 400px;"></div>
        <?php } ?>
	</div>
	<div style="padding: 20px 0px;">
		<div style="font-weight: 500; font-size: 26px;"><?=$Service->$service_name;?></div>
		<div style="font-weight: 300; padding-top: 10px;">
			<?=$Service['serviceDetails'][0]->$service_detail_content?>
		</div>
	</div>
</div>
<script type="text/javascript">
$("document").ready(function(){
    var $wrap = undefined;
    var options = null;
    if ( $.fn.owlCarousel ) {
        var owlSettings = {
            items: 1,
            loop: true,
            margin: 0,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
            dots: true,
            lazyLoad: true,
            smartSpeed: 400,
            autoplay: false,
            autoplayTimeout: 15000
        };
        if (typeof $wrap == 'undefined') {
            $wrap = $('body');
        }
        if (options) {
            owlSettings = $.extend({}, owlSettings, options);
        }
        // Init all carousel
        $wrap.find('[data-toggle="owl"]').each(function () {
            var $this = $(this),
                newOwlSettings = $.extend({}, owlSettings, $this.data('owl-options'));
            $this.owlCarousel(newOwlSettings);
            
        });   
    }
});
</script>