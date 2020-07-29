<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\JoinAsset;
JoinAsset::register($this);
?>
<main class="main">
	<div class="join-posts">
		<div class="container">
			<?php echo $this->render('_banner'); ?>
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
						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header" role="tab" id="heading1">
								<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
									<h5 >
										พนักงานขาย <i class="fa fa-angle-down" aria-hidden="true"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1"
							data-parent="#accordionEx">
								<div class="card-body">
									<div style="padding: 15px 0px;">
										<p><b>คุณสมบัติทั่วไป</b></p>
										<p>- อายุ 18-35 ปี</p>
										<p>- จบปริญญาตรี สาขาใดก็ได้ </p>
										<p>- มีความขยัน อดทน ตั้งใจทำงาน รักงานบริการ</p>
										<p>- มีมนุษยสัมพันธ์ดี</p>
										<p>- มีประสบการณ์ ธุรกิจค้าปลีก จะพิจารณาเป็นพิเศษ</p>

										<p><b>สวัสดิการ และรายได้</b></b></p>
										<p>- ค่าครองชีพ</p>
										<p>- กองทุนสำรองเลี้ยงชีพ</p>
										<p>- ค่ารักษาพยาบาล</p>
										<p>- ตรวจสุขภาพประจำปี</p>
										<p>- ค่านั่งเครื่องแคชเชียร์</p>
										<p>- เงินรางวัลจากยอดขาย (Incentive)</p>
										<p>- วันลาพิเศษ</p>
										<p>- เงินช่วยเหลือต่างๆ</p>

										<hr>
										<p>ส่งใบสมัครด้วยตัวเองมาที่ อีเมล hr@wehomemart.com</p>
									</div>
									<div style="padding: 15px 0px;">
										<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>/sale-1" class="btnApply">Apply now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Accordion card -->

						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header" role="tab" id="heading2">
								<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
									<h5 >
										พนังานแคชเชียร์ <i class="fa fa-angle-down" aria-hidden="true"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2"
							data-parent="#accordionEx">
								<div class="card-body">
									<div style="padding: 15px 0px;">
										<p><b>คุณสมบัติทั่วไป</b></p>
										<p>- อายุ 18-35 ปี</p>
										<p>- จบปริญญาตรี สาขาใดก็ได้ </p>
										<p>- มีความขยัน อดทน ตั้งใจทำงาน รักงานบริการ</p>
										<p>- มีมนุษยสัมพันธ์ดี</p>
										<p>- มีประสบการณ์ ธุรกิจค้าปลีก จะพิจารณาเป็นพิเศษ</p>

										<p><b>สวัสดิการ และรายได้</b></b></p>
										<p>- ค่าครองชีพ</p>
										<p>- กองทุนสำรองเลี้ยงชีพ</p>
										<p>- ค่ารักษาพยาบาล</p>
										<p>- ตรวจสุขภาพประจำปี</p>
										<p>- ค่านั่งเครื่องแคชเชียร์</p>
										<p>- เงินรางวัลจากยอดขาย (Incentive)</p>
										<p>- วันลาพิเศษ</p>
										<p>- เงินช่วยเหลือต่างๆ</p>

										<hr>
										<p>ส่งใบสมัครด้วยตัวเองมาที่ อีเมล hr@wehomemart.com</p>
									</div>
									<div style="padding: 15px 0px;">
										<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>/sale-1" class="btnApply">Apply now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Accordion card -->

						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header" role="tab" id="heading2">
								<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse3" aria-expanded="false" aria-controls="collapse2">
									<h5 >
										พนังานบัญชี <i class="fa fa-angle-down" aria-hidden="true"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3"
							data-parent="#accordionEx">
								<div class="card-body">
									<div style="padding: 15px 0px;">
										<p><b>คุณสมบัติทั่วไป</b></p>
										<p>- อายุ 18-35 ปี</p>
										<p>- จบปริญญาตรี สาขาใดก็ได้ </p>
										<p>- มีความขยัน อดทน ตั้งใจทำงาน รักงานบริการ</p>
										<p>- มีมนุษยสัมพันธ์ดี</p>
										<p>- มีประสบการณ์ ธุรกิจค้าปลีก จะพิจารณาเป็นพิเศษ</p>

										<p><b>สวัสดิการ และรายได้</b></b></p>
										<p>- ค่าครองชีพ</p>
										<p>- กองทุนสำรองเลี้ยงชีพ</p>
										<p>- ค่ารักษาพยาบาล</p>
										<p>- ตรวจสุขภาพประจำปี</p>
										<p>- ค่านั่งเครื่องแคชเชียร์</p>
										<p>- เงินรางวัลจากยอดขาย (Incentive)</p>
										<p>- วันลาพิเศษ</p>
										<p>- เงินช่วยเหลือต่างๆ</p>

										<hr>
										<p>ส่งใบสมัครด้วยตัวเองมาที่ อีเมล hr@wehomemart.com</p>
									</div>
									<div style="padding: 15px 0px;">
										<a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>/sale-1" class="btnApply">Apply now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Accordion card -->
					</div>
					<!-- Accordion wrapper -->
				</div>
			</div>
		</div>
	</div>

</main>