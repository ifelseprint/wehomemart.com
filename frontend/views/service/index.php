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
        <div class="service-banner">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
            			<img src="<?=Url::base(true);?>/img/bannerservice.jpg" width="100%">
            		</div>
            	</div>
            </div>
        </div>
        <div class="service-block">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="service-header">
	        				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	        			</div>
	        		</div>
	        	</div>
	        	<div class="row">
	    			<div class="col-lg-4">
	    				<a href="javascript:void(0)" class="btn-modal-view" value="service/view">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/img/service1.jpg" width="100%">
								</div>
			    				<div class="service-title">
			    					บริการต่อเติม
			    				</div>
			    				<div class="service-detail">
			    					Lorem ipsum dolor sit amet, consectetur adipiscing elit nostrud exercitation
			    				</div>
			    			</div>
			    		</a>
	    			</div>
	    			<div class="col-lg-4">
	    				<a href="javascript:void(0)" class="btn-modal-view" value="service/view">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/img/service2.jpg" width="100%">
								</div>
			    				<div class="service-title">
			    					บริการต่อเติม
			    				</div>
			    				<div class="service-detail">
			    					Lorem ipsum dolor sit amet, consectetur adipiscing elit nostrud exercitation
			    				</div>
			    			</div>
			    		</a>
	    			</div>
	    			<div class="col-lg-4">
	    				<a href="javascript:void(0)" class="btn-modal-view" value="service/view">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/img/service3.jpg" width="100%">
								</div>
			    				<div class="service-title">
			    					บริการต่อเติม
			    				</div>
			    				<div class="service-detail">
			    					Lorem ipsum dolor sit amet, consectetur adipiscing elit nostrud exercitation
			    				</div>
			    			</div>
			    		</a>
	    			</div>
	    		</div>

	    		<div class="row">
	    			<div class="col-lg-4">
	    				<a href="javascript:void(0)" class="btn-modal-view" value="service/view">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/img/service1.jpg" width="100%">
								</div>
			    				<div class="service-title">
			    					บริการต่อเติม
			    				</div>
			    				<div class="service-detail">
			    					Lorem ipsum dolor sit amet, consectetur adipiscing elit nostrud exercitation
			    				</div>
			    			</div>
			    		</a>
	    			</div>
	    			<div class="col-lg-4">
	    				<a href="javascript:void(0)" class="btn-modal-view" value="service/view">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/img/service2.jpg" width="100%">
								</div>
			    				<div class="service-title">
			    					บริการต่อเติม
			    				</div>
			    				<div class="service-detail">
			    					Lorem ipsum dolor sit amet, consectetur adipiscing elit nostrud exercitation
			    				</div>
			    			</div>
			    		</a>
	    			</div>
	    			<div class="col-lg-4">
	    				<a href="javascript:void(0)" class="btn-modal-view" value="service/view">
		    				<div class="service-box">
			    				<div class="service-image">
			    					<img src="<?=Url::base(true);?>/img/service3.jpg" width="100%">
								</div>
			    				<div class="service-title">
			    					บริการต่อเติม
			    				</div>
			    				<div class="service-detail">
			    					Lorem ipsum dolor sit amet, consectetur adipiscing elit nostrud exercitation
			    				</div>
			    			</div>
			    		</a>
	    			</div>
	    		</div>
	        </div>
        </div>
    </div>
</main>
<?php
$script = <<<JS
$("document").ready(function(){

});
JS;
$this->registerJs($script);
?>
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