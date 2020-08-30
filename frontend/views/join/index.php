<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\JoinAsset;
JoinAsset::register($this);
?>
<main class="main">
	<div class="join-posts">
		<div class="container">
			<?= $this->render('_banner', ['Banner'=> $Banner]); ?>
			<div class="row">
				<div class="col-xs-12 col-lg-4 box-left">
					<div class="join-content">
						<div class="join-content-box">
							<div class="join-title-header"><span class="text-header">ขั้นตอนการสมัครงาน</span></div>
							<div class="join-title-detail">
								เข้ามาโดยตรงที่ออฟฟิต หรือกรอกข้อมูลสมัครงานในตำแหน่งงานที่ต้องการสมัครที่อยู่ด้านขวา โดยคลิกที่ปุ่ม <span class="text-header">Apply now</span>
							</div>
						</div>
						<hr>
						<div class="join-content-box">
							<div class="join-title-header"><span class="text-header">ลิลันดา บุคคล</span></div>
							<div class="join-title-detail">
								เจ้าหน้าที่ทรัพยากรบุคคล
							</div>
						</div>
						<hr>
						<div class="join-content-box">
							<div class="join-title-header"><span class="text-header">ที่อยู่</span></div>
							<div class="join-title-detail">
								989/1-5 หมู่ 4 ตําบลปลวกแดง อ.ปลวกแดง จ.ระยอง 21140
							</div>
						</div>
						<hr>
						<div class="join-content-box">
							<div><span class="text-header">Tel :</span> 081-8391818</div>
							<div><span class="text-header">Email :</span> hr@wehomemart.com</div>
						</div>

					</div>
				</div>
				<div class="col-xs-12 col-lg-8 box-right">
					<!--Accordion wrapper-->
					<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
						<?php
						foreach ($Jobs as $value){
							$jobs_name = 'jobs_name_'.Yii::$app->language;
							$jobs_content = 'jobs_content_'.Yii::$app->language;	
						?>
						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header" role="tab" id="heading<?=$value->jobs_id;?>">
								<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?=$value->jobs_id;?>" aria-expanded="false" aria-controls="collapse<?=$value->jobs_id;?>">
									<h5 >
										<?=$value->$jobs_name;?> <i class="fa fa-angle-down" aria-hidden="true"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapse<?=$value->jobs_id;?>" class="collapse" role="tabpanel" aria-labelledby="heading<?=$value->jobs_id;?>"
							data-parent="#accordionEx">
								<div class="card-body">
									<div style="padding: 15px 0px;">
										<?=$value->$jobs_content;?>
									</div>
									<div style="padding: 15px 0px;">
										<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>/<?=$value->$jobs_name;?>-<?=$value->jobs_id;?>" class="btnApply">Apply now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Accordion card -->
						<?php } ?>
						
					</div>
					<!-- Accordion wrapper -->
				</div>
			</div>
		</div>
	</div>

</main>