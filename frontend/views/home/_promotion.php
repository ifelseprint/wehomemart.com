<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="promotion-posts">
    <div class="container">

    	<div class="block-title">
            <h2 class="title text-center"><?=Yii::$app->translated->get(3);?></h2><!-- End .title-lg text-center -->
        </div>

        <div class="promotion-posts-slide">
            <div class="owl-carousel owl-simple carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options='{
                    "nav": true, 
                    "dots": true,
                    "items": 2,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":2
                        }
                    }
                }'>
	            <div class="owl-stage-outer">
	            	<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.4s ease 0s; width: 1188px;">
	            		<?php
	            		foreach ($Promotion as $value) {
	            			$promotion_image = 'promotion_image_'.Yii::$app->language;
	            		?>
	            		<div class="owl-item active" style="width: 376px; margin-right: 20px;">
	            			<article class="entry entry-display">
			                    <figure class="entry-media">
			                        <a href="#">
			                            <img src="<?=Url::base(true);?>/uploads/<?=$value->promotion_image_path?>/<?=$value->$promotion_image?>" alt="image desc">
			                        </a>
			                    </figure><!-- End .entry-media -->
	                		</article>
	                	</div>
	                	<?php } ?>
	                </div> <!-- End .owl-stage -->
	            </div>
	            <div class="owl-nav disabled">
	            	<button type="button" role="presentation" class="owl-prev">
	            		<i class="icon-angle-left"></i>
	            	</button>
	            	<button type="button" role="presentation" class="owl-next">
	            		<i class="icon-angle-right"></i>
	            	</button>
	            </div>
	            <div class="owl-dots disabled">
	            	<button role="button" class="owl-dot active"><span></span></button>
	            </div>
	        </div><!-- End .owl-carousel -->
	    </div>
    </div><!-- End .container -->
</div> <!-- End .promotion-posts -->