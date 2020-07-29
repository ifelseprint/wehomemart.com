<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ArticleAsset;
ArticleAsset::register($this);
?>
<main class="main">
	<div class="article-posts">
        <div class="article-banner">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
            			<img src="<?=Url::base(true);?>/img/banner-article.jpg">
            		</div>
            	</div>
            </div>
        </div>
        <div class="article-block">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="article-header">
	        				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	        			</div>
	        		</div>
	        	</div>
	        	<div class="row">
	    			<div class="col-lg-6">
	    				<div class="article-box">
	    					<div class="article-box-header">
			    				<div class="article-view">
			    					<i class="fa fa-eye" aria-hidden="true"></i> 12,312 คนดูบทความนี้
								</div>
			    				<div class="article-created-date">
			    					<i class="fa fa-clock-o"></i> 24 มิถุนายน 2563
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="article-box-title">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1"><h4>ปลูกต้นไม้มงคลในบ้าน</h4></a>
							</div>
							<div class="article-box-image">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">
				    				<div class="box-image-left">
				    					<div class="box-image-1" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="box-image-right">
				    					<div class="box-image-2" style="background-image: url(../img/blog5.jpg);"></div>
				    					<div class="box-image-3" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="clearfix"></div>
				    			</a>
							</div>
							<div class="article-box-detail">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="article-box-readmore">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">อ่านต่อ</a>
							</div>
		    			</div>
	    			</div>
	    			<div class="col-lg-6">
	    				<div class="article-box">
	    					<div class="article-box-header">
			    				<div class="article-view">
			    					<i class="fa fa-eye" aria-hidden="true"></i> 12,312 คนดูบทความนี้
								</div>
			    				<div class="article-created-date">
			    					<i class="fa fa-clock-o"></i> 24 มิถุนายน 2563
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="article-box-title">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1"><h4>ปลูกต้นไม้มงคลในบ้าน</h4></a>
							</div>
							<div class="article-box-image">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">
				    				<div class="box-image-left">
				    					<div class="box-image-1" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="box-image-right">
				    					<div class="box-image-2" style="background-image: url(../img/blog5.jpg);"></div>
				    					<div class="box-image-3" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="clearfix"></div>
				    			</a>
							</div>
							<div class="article-box-detail">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="article-box-readmore">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">อ่านต่อ</a>
							</div>
		    			</div>
	    			</div>
	    		</div>

	    		<div class="row">
	    			<div class="col-lg-6">
	    				<div class="article-box">
	    					<div class="article-box-header">
			    				<div class="article-view">
			    					<i class="fa fa-eye" aria-hidden="true"></i> 12,312 คนดูบทความนี้
								</div>
			    				<div class="article-created-date">
			    					<i class="fa fa-clock-o"></i> 24 มิถุนายน 2563
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="article-box-title">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1"><h4>ปลูกต้นไม้มงคลในบ้าน</h4></a>
							</div>
							<div class="article-box-image">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">
				    				<div class="box-image-left">
				    					<div class="box-image-1" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="box-image-right">
				    					<div class="box-image-2" style="background-image: url(../img/blog5.jpg);"></div>
				    					<div class="box-image-3" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="clearfix"></div>
				    			</a>
							</div>
							<div class="article-box-detail">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="article-box-readmore">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">อ่านต่อ</a>
							</div>
		    			</div>
	    			</div>
	    			<div class="col-lg-6">
	    				<div class="article-box">
	    					<div class="article-box-header">
			    				<div class="article-view">
			    					<i class="fa fa-eye" aria-hidden="true"></i> 12,312 คนดูบทความนี้
								</div>
			    				<div class="article-created-date">
			    					<i class="fa fa-clock-o"></i> 24 มิถุนายน 2563
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="article-box-title">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1"><h4>ปลูกต้นไม้มงคลในบ้าน</h4></a>
							</div>
							<div class="article-box-image">
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">
				    				<div class="box-image-left">
				    					<div class="box-image-1" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="box-image-right">
				    					<div class="box-image-2" style="background-image: url(../img/blog5.jpg);"></div>
				    					<div class="box-image-3" style="background-image: url(../img/blog5.jpg);"></div>
				    				</div>
				    				<div class="clearfix"></div>
				    			</a>
							</div>
							<div class="article-box-detail">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="article-box-readmore">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/xxxx-1">อ่านต่อ</a>
							</div>
		    			</div>
	    			</div>
	    		</div>
	        </div>
        </div>
    </div>
</main>