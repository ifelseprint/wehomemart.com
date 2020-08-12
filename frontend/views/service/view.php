<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ServiceAsset;
ServiceAsset::register($this);
?>

<div style="padding: 0px 20px 20px 20px;">
	<div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": true,"autoplay":true,"autoplayTimeout":3000,"lazyLoad":true,"autoplayHoverPause":true}' style="height: 400px;    overflow: hidden;">
	    <div class="intro-slide"><img src="<?=Url::base(true);?>/img/banner.jpg" style="height: 400px;"></div>
	    <div class="intro-slide"><img src="<?=Url::base(true);?>/img/banner-mock.jpg" style="height: 400px;"></div>
	</div>
	<div style="padding: 20px 0px;">
		<div style="font-weight: 500; font-size: 26px;">บริการต่อเติม</div>
		<div style="font-weight: 300; padding-top: 10px;">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</p>
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