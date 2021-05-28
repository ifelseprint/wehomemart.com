<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use frontend\assets\ContactAsset;
ContactAsset::register($this);
?>

<?php Pjax::begin(['id' => 'pjax-grid','timeout' => 0, 'enablePushState' => false]); ?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
    <div class="loader-content loader-center">
        <div id="loading" class="loader"></div>
    </div>
</div>
<main class="main">
	<div class="contact-posts">
        <div class="contact-banner ">
        	<div class="container-iframe"> 
			  	<iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3887.70405630246!2d101.2176167!3d12.9907708!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102ddf1756f025b%3A0xa31a2691c01298a0!2zV0UgSE9NRSAo4Lin4Li14LmC4Liu4LihKSDguKrguLLguILguLLguJvguKXguKfguIHguYHguJTguIc!5e0!3m2!1sth!2sth!4v1615880507784!5m2!1sth!2sth" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
        </div>
        <div class="contact-block">
        	<div class="container">
	    		<div class="row">
	    			<div class="col-12 col-md-5">
	    				<div class="contact-address">
	    					<div class="title">Address</div>
	    					<div class="box">
		        				<div class="company">
		        					<table>
		        						<tr>
		        							<td class="icon"><i class="fa fa-map-marker"></i></td>
		        							<td class="text"><b><?=Yii::$app->translated->get(41);?></b></td>
		        						</tr>
		        					</table>
		        				</div>
		        				<div class="address">
		        					<table>
		        						<tr>
		        							<td class="icon"></td>
		        							<td class="text"><?=Yii::$app->translated->get(40);?></td>
		        						</tr>
		        					</table>
		        				</div>
		        				<hr>
		        				<div class="tel">
		        					<table>
		        						<tr>
		        							<td class="icon"><i class="fa fa-mobile"></i></td>
		        							<td class="text"><?=Yii::$app->translated->get(38);?></td>
		        						</tr>
		        					</table>
		        				</div>
		        				<div class="email">
		        					<table>
		        						<tr>
		        							<td class="icon"><i class="fa fa-envelope-o" style="font-size: 12px;"></i></td>
		        							<td class="text"><?=Yii::$app->translated->get(39);?></td>
		        						</tr>
		        					</table>
		        				</div>
		        				<hr>
		        				<div class="social">
		        					<ul>
		        						<li>
		        							<a href="#" class="icon facebook"><i class="icon-facebook" style="color: #2670bf;"></i> <span>wehomemart</span></a>
		        						</li>
		        						<li>
		        							<a href="#" class="icon line"><i class="icon-line" style="color: #28a745;"></i> <span>wehomemart</span></a>
		        						</li>
		        					</ul>
		        				</div>
		        				<hr>
		        				<div class="time">
		        					<table>
		        						<tr>
		        							<td class="icon"><i class="fa fa-clock-o"></i></td>
		        							<td class="text"><b><?=Yii::$app->translated->get(13);?></b></td>
		        						</tr>
		        					</table>
		        				</div>
		        			</div>
	        			</div>
	        		</div>
	        		<div class="col-12 col-md-1"></div>
	        		<div class="col-12 col-md-6">
	        			<div class="contact-form">
	    					<div class="title">Contact us</div>
	    					<div class="box">
	    						<?php if($Action=='view'){ ?>
	    						<?= $this->render('_form', ['ContactForm'=> $ContactForm]); ?>
	    						<?php }else{ ?>
								<div>
									<div>Thank you for your submission</div>
									<div>Send data successfully.</div>
								</div>
								<?php } ?>
	    					</div>
	    				</div>
	        		</div>
	        	</div>
	        </div>
        </div>
    </div>
</main>
<?php
$script = <<<JS
  $("document").ready(function(){

    $("#pjax-grid").on("pjax:start", function() {
      $('#loadingOverlay').show();
    });
    $("#pjax-grid").on("pjax:end", function() {
      $('#loadingOverlay').hide();
    });
  });
JS;
$this->registerJs($script);
?>
<?php Pjax::end(); ?>