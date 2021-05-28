<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use frontend\assets\JoinAsset;
JoinAsset::register($this);
?>
<?php Pjax::begin(['id' => 'pjax-grid','timeout' => 0, 'enablePushState' => false]); ?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
    <div class="loader-content loader-center">
        <div id="loading" class="loader"></div>
    </div>
</div>
<main class="main">
	<div class="join-posts">
		<div class="container">
			<?php echo $this->render('_banner'); ?>
			<div class="row">
				<div class="col-xs-12 col-lg-4 box-left">
					<div class="join-content">
						<div class="join-content-box">
							<div class="join-title-header"><span class="text-header"><?=Yii::$app->translated->get(33);?></span></div>
							<div class="join-title-detail">
								<?=Yii::$app->translated->get(34);?>
								 <span class="text-header">Apply now</span>
							</div>
						</div>
						<hr>
						<div class="join-content-box">
							<div class="join-title-header"><span class="text-header"><?=Yii::$app->translated->get(35);?></span></div>
							<div class="join-title-detail">
								<?=Yii::$app->translated->get(36);?>
							</div>
						</div>
						<hr>
						<div class="join-content-box">
							<div class="join-title-header"><span class="text-header"><?=Yii::$app->translated->get(37);?></span></div>
							<div class="join-title-detail">
								<?=Yii::$app->translated->get(40);?>
							</div>
						</div>
						<hr>
						<div class="join-content-box">
							<div><span class="text-header"><?=Yii::$app->translated->get(38);?> :</span> <?=Yii::$app->translated->get(46);?></div>
							<div><span class="text-header"><?=Yii::$app->translated->get(39);?> :</span> <?=Yii::$app->translated->get(47);?></div>
						</div>

					</div>
				</div>
				<div class="col-xs-12 col-lg-8 box-right">

					<?php if($Action=='view'){ ?>
					<!--Accordion wrapper-->
					<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header" role="tab" id="heading1">
								<a aria-expanded="true" aria-controls="collapse1">
									<h5 >
										<?php
										$jobs_name = 'jobs_name_'.Yii::$app->language;
										echo $Jobs->$jobs_name;
										?>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1"
							data-parent="#accordionEx">
								<div class="card-body">
									<div style="padding: 15px 0px;">

										<?= $this->render('_form', ['JobsForm'=> $JobsForm,'JobView'=>$JobView]); ?>
										
									</div>
								</div>
							</div>
						</div>
						<!-- Accordion card -->
					</div>
					<!-- Accordion wrapper -->

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
    $('.datepicker').daterangepicker({
      singleDatePicker: true,
      autoUpdateInput: false,
      locale: {
          "format": "DD/MM/YYYY",
          "separator": " - ",
          "applyLabel": "Apply",
          "cancelLabel": "Cancel",
          "fromLabel": "From",
          "toLabel": "To",
          "customRangeLabel": "Custom",
          "weekLabel": "W",
          "firstDay": 1
      },
      maxDate: new Date(),
      drops: "up",
      showDropdowns: true,
    },function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });
    $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

  });
JS;
$this->registerJs($script);
?>
<?php Pjax::end(); ?>