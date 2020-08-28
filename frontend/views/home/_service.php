<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
	<div class="loader-content loader-center">
		<div id="loading" class="loader"></div>
	</div>
</div>
<div class="service-posts">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-4 service-posts-item">
    			<div class="entry entry-display">
                    <figure class="entry-media">
                        <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_service');?>">
                            <img src ="<?=Url::base(true);?>/img/homa-service.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->
        		</div>
        	</div>
        	<?php
    		foreach ($Service as $value) {
    			$service_name = 'service_name_'.Yii::$app->language;
    			$service_content = 'service_content_'.Yii::$app->language;
    		?>
        	<div class="col-xs-12 col-lg-4 service-posts-item">
    			<div class="entry entry-display">
                    <figure class="entry-media" style="height: 250px;overflow: hidden;">
                        <a href="javascript:void(0)" class="btn-modal-view" value="<?=Yii::$app->language?>/service/view/<?=$value->service_id;?>">
                        	<img src="<?=Url::base(true);?>/uploads/<?=$value->service_image_path?>/<?=$value->service_image?>" alt="<?=$value->$service_name?>" title="<?=$value->$service_name;?>">
                        </a>
                    </figure><!-- End .entry-media -->
                    <div class="entry-body text-center">
                        <h3 class="entry-title">
                            <a href="javascript:void(0)" class="btn-modal-view" value="<?=Yii::$app->language?>/service/view/<?=$value->service_id;?>"><?=$value->$service_name;?></a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <a href="javascript:void(0)" class="btn-modal-view" value="<?=Yii::$app->language?>/service/view/<?=$value->service_id;?>">
                            	<?=$value->$service_content;?>
                            </a>
                        </div><!-- End .entry-content -->
                	</div>
        		</div>
        	</div>
        	<?php } ?>
        	
		</div>
	</div>
</div>

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