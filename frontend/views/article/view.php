<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ArticleAsset;
ArticleAsset::register($this);
?>

<?php
$article_name = 'article_name_'.Yii::$app->language;
$article_detail_content = 'article_detail_content_'.Yii::$app->language;
?>
<main class="main">
	<div class="article-posts">
        <div class="article-block-view">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="article-view-header">
	    					<div class="article-view-title"><?=$Article->$article_name?></div>
	        				<div class="article-view-created-date">24 มิถุนายน 2563</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="row justify-content-md-center">
	    			<div class="col-lg-10 col-lg-offset-2">
	        			<div class="article-view-social">
	        				<ul style="display: flex;align-items: center;">
	        					<li>
	        						<a href="https://www.facebook.com/sharer.php?u=<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/<?=$Article->$article_name?>-<?=$Article->article_id?>" target="_blank" class="icon facebook"><i class="fa fa-facebook"></i></a>
	        					</li>
	        					<li>
	        						<a href="http://twitter.com/share?text=<?=$Article->$article_name?>&url=<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/<?=$Article->$article_name?>-<?=$Article->article_id?>" class="icon twitter" target="_blank"><i class="fa fa-twitter"></a></i>
	        					</li>
	        				</ul>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="row justify-content-md-center">
	    			<div class="col-lg-9 col-lg-offset-2">
	    				<div class="article-view-content">
    						<?=$Article['articleDetails'][0]->$article_detail_content?>
	    				</div>
	    			</div>
	    		</div>
<!-- 	    		<div class="row justify-content-md-center">
	    			<div class="col-lg-10 col-lg-offset-2">
	    				<div class="article-view-content-footer">
	    					<div class="float-left"> << ก่อนหน้า </div>
	    					<div class="float-right"> ถัดไป >> </div>
	    					<div class="clearfix"></div>
	    				</div>
	    			</div>
	    		</div> -->
	        </div>
        </div>
    </div>
</main>