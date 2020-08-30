<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AboutAsset;
AboutAsset::register($this);
?>
<main class="main">
	<div class="about-posts">
        <?= $this->render('_banner', ['Banner'=> $Banner]); ?>
        <div class="about-block">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-5 box-left">
	        			<img src="<?=Url::base(true);?>/img/about.jpg">
	        		</div>
	        		<div class="col-lg-7 box-right">
	    				<div class="about-content">
	    					<div class="row">
		        				<div class="col-lg-12">
		        					<div class="content-box">
		        						<div class="content-about"><?=Yii::$app->translated->get(14);?></div>
		        						<div class="content-header"><?=Yii::$app->translated->get(16);?></div>
		        						<div class="content-text"><?=Yii::$app->translated->get(17);?></div>
		        						<div style="padding-top: 15px;">
		        							<span style="padding: 5px 12px;background: #075176;color: #fff;border-radius: 5px;">VISION</span>
		        							<?=Yii::$app->translated->get(18);?>
		        						</div>
		        					</div>
		        				</div>
		        			</div>
	    					<div class="row">
		        				<div class="col-lg-4">
		        					<div class="content-box">
		        						<div class="content-icon">
		        							<img src="<?=Url::base(true);?>/img/vision1.jpg" width="30">
		        						</div>
		        						<div class="content-title">WE SMILE</div>
		        						<div class="content-text"><?=Yii::$app->translated->get(19);?></div>
		        						<hr>
		        						<div class="content-text"><?=Yii::$app->translated->get(20);?></div>
		        					</div>
		        				</div>
		        				<div class="col-lg-4">
		        					<div class="content-box">
		        						<div class="content-icon">
		        							<img src="<?=Url::base(true);?>/img/vision2.jpg" width="30">
		        						</div>
		        						<div class="content-title">WE SERVICE</div>
		        						<div class="content-text"><?=Yii::$app->translated->get(21);?></div>
		        						<hr>
		        						<div class="content-text"><?=Yii::$app->translated->get(22);?></div>
		        					</div>
		        				</div>
		        				<div class="col-lg-4">
		        					<div class="content-box">
		        						<div class="content-icon">
		        							<img src="<?=Url::base(true);?>/img/vision3.jpg" width="30">
		        						</div>
		        						<div class="content-title">WE CARE</div>
		        						<div class="content-text"><?=Yii::$app->translated->get(23);?></div>
		        						<hr>
		        						<div class="content-text"><?=Yii::$app->translated->get(24);?></div>
		        					</div>
		        				</div>
		        			</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
        </div>
        <div class="mission-block">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-7">
	    				<div style="padding: 30px 0px;">
	    					<span style="padding: 5px 12px;background: #075176;color: #fff;border-radius: 5px;">MISSION</span>
	    				</div>
	    				<div class="row">
	    					<div class="col-lg-6">
	    						<div class="content-box">
	    							<div class="title">High Quality</div>
	    							<div class="row box">
				    					<div class="col-lg-2">
				    						<img src="<?=Url::base(true);?>/img/mission1.jpg" >
				    					</div>
				    					<div class="col-lg-10">
				    						<div class="content-text"><?=Yii::$app->translated->get(25);?></div>
				    					</div>
				    				</div>
		    					</div>
	    					</div>
	    					<div class="col-lg-6">
	    						<div class="content-box">
	    							<div class="title">Increase revenue</div>
	    							<div class="row box">
				    					<div class="col-lg-2">
				    						<img src="<?=Url::base(true);?>/img/mission2.jpg" >
				    					</div>
				    					<div class="col-lg-10">
				    						<div class="content-text"><?=Yii::$app->translated->get(26);?></div>
				    					</div>
				    				</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="row">
	    					<div class="col-lg-6">
	    						<div class="content-box">
	    							<div class="title">Success Of Partner</div>
	    							<div class="row box">
				    					<div class="col-lg-2">
				    						<img src="<?=Url::base(true);?>/img/mission3.jpg" >
				    					</div>
				    					<div class="col-lg-10">
				    						<div class="content-text"><?=Yii::$app->translated->get(27);?></div>
				    					</div>
				    				</div>
		    					</div>
	    					</div>
	    					<div class="col-lg-6">
	    						<div class="content-box">
	    							<div class="title">Owner Business Model</div>
	    							<div class="row box">
				    					<div class="col-lg-2">
				    						<img src="<?=Url::base(true);?>/img/mission4.jpg" >
				    					</div>
				    					<div class="col-lg-10">
				    						<div class="content-text"><?=Yii::$app->translated->get(28);?></div>
				    					</div>
				    				</div>
		    					</div>
	    					</div>
	    				</div>
	    			</div>
	    			<div class="col-lg-5">
	    				<div>
	    					<img src="<?=Url::base(true);?>/img/about2.jpg">
	    				</div>
	    			</div>
	    		</div>
	    	</div>
        </div>
    </div>
</main>