<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ServiceAsset;
ServiceAsset::register($this);
?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
	<div class="loader-content loader-center">
		<div id="loading" class="loader"></div>
	</div>
</div>

<main class="main">
	<div class="service-posts">
        <?= $this->render('_banner', ['Banner'=> $Banner]); ?>
        <div class="service-block">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="service-header">
	    					
	        				<?=Yii::$app->translated->get(32);?>
	        			</div>
	        		</div>
	        	</div>

	        	<?php
				//Columns must be a factor of 12 (1,2,3,4,6,12)
				$numOfCols = 3;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				?>
				<div class="row">
				<?php
				foreach ($Service as $value){
					$service_name = 'service_name_'.Yii::$app->language;
					$service_content = 'service_content_'.Yii::$app->language;
				?>  
			        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
			            <a href="javascript:void(0)" class="btn-modal-view" value="service/view/<?=$value->service_id;?>">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/uploads/<?=$value->service_image_path?>/<?=$value->service_image?>" width="100%">
								</div>
			    				<div class="service-title">
			    					<?=$value->$service_name;?>
			    				</div>
			    				<div class="service-detail">
			    					<?=$value->$service_content;?>
			    				</div>
			    			</div>
			    		</a>
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
<!-- Modal Popup View ##################### -->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        	<div class="modal-header" style="padding: 20px; border: 0;">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size: 28px;padding: 10px 15px;background: #075176;color: #fff;border-radius: 50% 50%;">X</button>
        	</div>
            <div class="modal-body" style="padding: 0px;">
                <div id='modal-content-view'>Loading..</div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Popup view ##################### -->