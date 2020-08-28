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

	        	<?php
				//Columns must be a factor of 12 (1,2,3,4,6,12)
				$numOfCols = 2;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				?>
				<div class="row">
				<?php
				foreach ($Article as $value){
					$article_name = 'article_name_'.Yii::$app->language;
					$article_content = 'article_content_'.Yii::$app->language;
				?>  
			        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
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
			    				<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/<?=$value->$article_name?>-<?=$value->article_id?>"><h4><?=$value->$article_name?></h4></a>
							</div>
							<div class="article-box-image">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/<?=$value->$article_name?>-<?=$value->article_id?>">
				    				<img src="<?=Url::base(true);?>/uploads/<?=$value->article_image_path?>/<?=$value->article_image?>" alt="image desc">
				    			</a>
							</div>
							<div class="article-box-detail">
								<?=$value->$article_content?>
							</div>
							<div class="article-box-readmore">
								<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>/<?=$value->$article_name?>-<?=$value->article_id?>">อ่านต่อ</a>
							</div>
		    			</div>
	    			</div>
	    		<?php
				    $rowCount++;
				    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
				}
				?>
				</div>
	    	
	        </div>
        </div>
    </div>
</main>