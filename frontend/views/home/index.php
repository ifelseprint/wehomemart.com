<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\HomeAsset;
use frontend\assets\AppAsset;
AppAsset::register($this);
HomeAsset::register($this);
?>
<main class="main">
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
            <div class="intro-slide" style="background-image: url(<?=Url::base(true);?>/img/banner.jpg);">
              
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url(<?=Url::base(true);?>/img/banner-mock.jpg);">
                <div class="container intro-content">
                    <h3 class="intro-subtitle">Welcome to </h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title"> We Home<br><span class="text-primary">ศูนย์จำหน่ายสินค้าวัสดุก่อสร้าง </span></h1><!-- End .intro-title -->

                    <a href="category.html" class="btn btn-primary">
                        <span>Shop Now</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->

            
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="promotion-posts">
        <div class="container">

        	<div class="block-title">
	            <h2 class="title text-center">โปรโมชั่นออนไลน์</h2><!-- End .title-lg text-center -->
	           	<p class="text-center">ดูโปรโมชั่นออนไลน์ทั้งหมด >></p>
	        </div>

	        <div style="padding: 0px 80px;">
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
		            		<div class="owl-item active" style="width: 376px; margin-right: 20px;">
		            			<article class="entry entry-display">
				                    <figure class="entry-media">
				                        <a href="single.html">
				                            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-2/blog/post-1.jpg" alt="image desc">
				                        </a>
				                    </figure><!-- End .entry-media -->
		                		</article>
		                	</div>
		                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
		                		<article class="entry entry-display">
				                    <figure class="entry-media">
				                        <a href="single.html">
				                            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-2/blog/post-2.jpg" alt="image desc">
				                        </a>
				                    </figure><!-- End .entry-media -->
	 
		                		</article>
		                	</div>
		                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
		                		<article class="entry entry-display">
				                    <figure class="entry-media">
				                        <a href="single.html">
				                            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-2/blog/post-3.jpg" alt="image desc">
				                        </a>
				                    </figure><!-- End .entry-media -->
		                		</article>
		                	</div>

		                	<div class="owl-item active" style="width: 376px; margin-right: 20px;">
		                		<article class="entry entry-display">
				                    <figure class="entry-media">
				                        <a href="single.html">
				                            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-2/blog/post-1.jpg" alt="image desc">
				                        </a>
				                    </figure><!-- End .entry-media -->
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
		    </div>
        </div><!-- End .container -->
    </div> <!-- End .promotion-posts -->

    <div class="product-posts">
    	<div class="container">
    		<div class="block-title">
	            <h2 class="title text-center">WEHOME ศูนย์รวมจำหน่ายวัสดุก่อสร้าง เครื่องมือช่าง ครบวงจร</h2><!-- End .title-lg text-center -->
	           	<p class="text-center">วัสดุก่อสร้าง เครื่องมือช่าง อุปกรณ์ฮาร์ดแวร์ เหล็กเส้น เหล็กรูปพรรณ กระเบื้องเซรามิค สุขภัณฑ์ เฟอร์นิเจอร์ และสินค้าตกแต่งบ้าน</p>
	        </div>
    		<div class="row"> 
    			<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/วัสดุโครงส้ราง.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/วัสดุโครงส้ราง.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">วัสดุโครงสร้าง</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>

				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/เคมีภัณฑ์.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/เคมีภัณฑ์.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">เคมีภัณฑ์สี และอุปกรณ์</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>

				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/งานระบบบ.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/งานระบบบ.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">งานระบบ และอุปกรณ์ประปา</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>

				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/ไฟฟ้าและแสงสว่าง.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/ไฟฟ้าและแสงสว่าง.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">อุปกรณ์ไฟฟ้า และแสงสว่าง</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>

				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/สุขภัณฑ์.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/สุขภัณฑ์.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">สุขภัณฑ์และอุปกรณ์</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>
				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/ครัว.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/ครัว.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">ครัว และอุปกรณ์</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>
				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/งานเกษตร.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/งานเกษตร.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">ผลิตภัณฑ์ไม้ / สวนและงานเกษตร</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>
				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/ทำความสะอาด.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/ทำความสะอาด.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">อุปกรณ์ทำความสะอาด อุปกรณ์ใช้ภายในบ้าน</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>
				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/ก่อสร้าง.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/ก่อสร้าง.jpg" alt="Product image" class="product-image-hover">
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">เครื่องมือช่าง และอุปกรณ์ช่างไฟฟ้า</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>
				<div class="col-xs-6 col-lg-3">
				    <div class="product text-left">
				        <figure class="product-media">
				            <a href="product.html">
				                <img src ="<?=Url::base(true);?>/img/เครื่องมือช่าง.jpg" alt="Product image" class="product-image">
				                <img src ="<?=Url::base(true);?>/img/เครื่องมือช่าง.jpg" alt="Product image" class="product-image-hover">
				                 
				            </a>
				        </figure><!-- End .product-media -->
				        <div class="product-body">
				            <div class="product-title">
				            	<a href="#">วัสดุอุกรณ์ก่อสร้าง และอุปกรณ์ฮาร์ดแวร์</a>
				            </div><!-- End .product-title -->
				        </div><!-- End .product-body -->
				    </div>
				</div>
			</div>
		</div>
	</div> <!-- End .product-posts -->

	<div class="service-posts">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-lg-4">
	    			<div class="entry entry-display">
	                    <figure class="entry-media">
	                        <a href="#">
	                            <img src ="<?=Url::base(true);?>/img/homa-service.jpg" alt="image desc">
	                        </a>
	                    </figure><!-- End .entry-media -->
	                    <div class="entry-body text-center">
	
	                        <div class="entry-content">
	                            <a href="#">ดูบริการทั้งหมด..</a>
	                        </div><!-- End .entry-content -->
	                	</div>
	        		</div>
	        	</div>

	        	<div class="col-xs-12 col-lg-4">
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

	        	<div class="col-xs-12 col-lg-4">
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
    	<div class="col-xs-12 col-lg-6">
    		<img src ="<?=Url::base(true);?>/img/idea.jpg" alt="image desc" width="100%">
    	</div>
    	<div class="col-xs-12 col-lg-6 block-content">
			<div class="block-desc">
				<div>
	    			<img src ="<?=Url::base(true);?>/img/homeofidea.png" alt="image desc" width="324">
		    		<h2 class="title text-left">แต่งบ้านแนวบ้านปูนเปือย</h2><!-- End .title-lg text-center -->
		    		<p class="text-left">บ้านที่ดีคือบ้านที่อยู่แล้วเป็นสุข ซึ่งก็คือ การออกแบบสภาพแวดล้อมให้มีความใกล้ชิดกับ “ธรรมชาติของตัวเรา” มากที่สุด</p>

		    		<a href="#" class="btn-readmore">อ่านต่อ</a>
		    	</div>
	    	</div>
    	</div>
  	</div> <!-- End .promotion-posts -->

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