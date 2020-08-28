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

	<div class="service-posts">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-lg-4 service-posts-item">
	    			<div class="entry entry-display">
	                    <figure class="entry-media">
	                        <a href="#">
	                            <img src ="<?=Url::base(true);?>/img/homa-service.jpg" alt="image desc">
	                        </a>
	                    </figure><!-- End .entry-media -->
	        		</div>
	        	</div>

	        	<div class="col-xs-12 col-lg-4 service-posts-item">
	    			<div class="entry entry-display">
	                    <figure class="entry-media">
	                        <a href="#">
	                             <img src ="<?=Url::base(true);?>/img/service-pic.jpg" alt="image desc">
	                        </a>
	                    </figure><!-- End .entry-media -->
	                    <div class="entry-body text-center">
	                        <h3 class="entry-title">
	                            <a href="#">Lorem ipsum dolor sit amet</a>
	                        </h3><!-- End .entry-title -->

	                        <div class="entry-content">
	                            <a href="#">
	                            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</p>
	                            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</p>
	                            </a>
	                        </div><!-- End .entry-content -->
	                	</div>
	        		</div>
	        	</div>

	        	<div class="col-xs-12 col-lg-4 service-posts-item">
	    			<div class="entry entry-display">
	                    <figure class="entry-media">
	                        <a href="#">
	                             <img src ="<?=Url::base(true);?>/img/service-pic.jpg" alt="image desc">
	                        </a>
	                    </figure><!-- End .entry-media -->
	                    <div class="entry-body text-center">
	                        <h3 class="entry-title">
	                            <a href="#">Lorem ipsum dolor sit amet</a>
	                        </h3><!-- End .entry-title -->

	                        <div class="entry-content">
	                            <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</a>
	                        </div><!-- End .entry-content -->
	                	</div>
	        		</div>
	        	</div>
    		</div>
    	</div>
    </div>

    <div class="idea-posts">

		<div class="row">
	    	<div class="col-lg-6">
	    		<img src ="<?=Url::base(true);?>/img/idea.jpg" alt="image desc" width="100%">
	    	</div>
	    	<div class="col-lg-6 block-content">
				<div class="block-desc">
					<div>
		    			<img src ="<?=Url::base(true);?>/img/homeofidea.png" alt="image desc" width="250">
			    		<h2 class="title text-left">แต่งบ้านแนวบ้านปูนเปือย</h2>
			    		<p class="text-left">บ้านที่ดีคือบ้านที่อยู่แล้วเป็นสุข ซึ่งก็คือ การออกแบบสภาพแวดล้อมให้มีความใกล้ชิดกับ “ธรรมชาติของตัวเรา” มากที่สุด</p>

			    		<div>
			    			<a href="#" class="btn-readmore">อ่านต่อ</a>
			    		</div>
			    	</div>
		    	</div>
	    	</div>
	    </div>

  	</div>

    <div class="article-posts">
    	<div class="container">

        	<div class="block-title">
	            <h2 class="title text-center">บทความเรื่องบ้าน</h2><!-- End .title-lg text-center -->
	           	<p class="text-center">ดูบทความทั้งหมด >></p>
	        </div>

            <div class="owl-carousel owl-simple carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "items": 4,
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
                            "items":4
                        }
                    }
                }'>
	            <div class="owl-stage-outer">
	            	<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.4s ease 0s; width: 1188px;">
	            		<div class="owl-item active" style="width: 376px; margin-right: 20px;">
	            			<article class="entry entry-display">
			                    <figure class="entry-media">
			                        <a href="#">
			                            <img src ="<?=Url::base(true);?>/img/blog1.jpg" alt="image desc">
			                        </a>
			                    </figure><!-- End .entry-media -->
			                    <div class="entry-body text-center">
	                                <h3 class="entry-title">
	                                    <a href="#">Lorem ipsum dolor sit amet</a>
	                                </h3><!-- End .entry-title -->

	                                <div class="entry-content">
	                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</a>
	                                </div><!-- End .entry-content -->
                            	</div>
	                		</article>
	                	</div>
	                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
	                		<article class="entry entry-display">
			                    <figure class="entry-media">
			                        <a href="single.html">
			                            <img src ="<?=Url::base(true);?>/img/blog2.jpg" alt="image desc">
			                        </a>
			                    </figure><!-- End .entry-media -->
 								<div class="entry-body text-center">
	                                <h3 class="entry-title">
	                                    <a href="#">Lorem ipsum dolor sit amet</a>
	                                </h3><!-- End .entry-title -->

	                                <div class="entry-content">
	                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</a>
	                                </div><!-- End .entry-content -->
                            	</div>
	                		</article>
	                	</div>
	                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
	                		<article class="entry entry-display">
			                    <figure class="entry-media">
			                        <a href="single.html">
			                            <img src ="<?=Url::base(true);?>/img/blog3.jpg" alt="image desc">
			                        </a>
			                    </figure><!-- End .entry-media -->
			                    <div class="entry-body text-center">
	                                <h3 class="entry-title">
	                                    <a href="#">Lorem ipsum dolor sit amet</a>
	                                </h3><!-- End .entry-title -->

	                                <div class="entry-content">
	                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</a>
	                                </div><!-- End .entry-content -->
                            	</div>
	                		</article>
	                	</div>

	                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
	                		<article class="entry entry-display">
			                    <figure class="entry-media">
			                        <a href="single.html">
			                            <img src ="<?=Url::base(true);?>/img/blog4.jpg" alt="image desc">
			                        </a>
			                    </figure><!-- End .entry-media -->
			                    <div class="entry-body text-center">
	                                <h3 class="entry-title">
	                                    <a href="#">Lorem ipsum dolor sit amet</a>
	                                </h3><!-- End .entry-title -->

	                                <div class="entry-content">
	                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</a>
	                                </div><!-- End .entry-content -->
                            	</div>
	                		</article>
	                	</div>

	                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
	                		<article class="entry entry-display">
			                    <figure class="entry-media">
			                        <a href="single.html">
			                            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-2/blog/post-1.jpg" alt="image desc">
			                        </a>
			                    </figure><!-- End .entry-media -->
			                    <div class="entry-body text-center">
	                                <h3 class="entry-title">
	                                    <a href="#">Lorem ipsum dolor sit amet</a>
	                                </h3><!-- End .entry-title -->

	                                <div class="entry-content">
	                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt..</a>
	                                </div><!-- End .entry-content -->
                            	</div>
	                		</article>
	                	</div>

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
        </div><!-- End .container -->
    </div> <!-- End .article-posts -->
   
</main><!-- End .main -->