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
								<a aria-expanded="true" aria-controls="collapse1">
									<h5 >
										พนักงานขาย
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1"
							data-parent="#accordionEx">
								<div class="card-body">
									<div style="padding: 15px 0px;">
										<form>
											<div class="form-group row">
												<div class="col-sm-1">
													<label>Title <span class="require">*</span></label>
												</div>
											    <div class="col-sm-11">
													<div class="form-check form-check-inline">
													  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
													  	<label class="form-check-label" for="inlineRadio1">Mr.</label>
													</div>
													<div class="form-check form-check-inline">
													  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
													  	<label class="form-check-label" for="inlineRadio2">Mrs.</label>
													</div>
													<div class="form-check form-check-inline">
													  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
													  	<label class="form-check-label" for="inlineRadio3">Ms.</label>
													</div>
												</div>
											</div>
										  	<div class="form-group row">
											    <div class="col-sm-6">
											    	<label>First name <span class="require">*</span></label>
											      	<input type="text" class="form-control" id="inputPassword">
											    </div>
											    <div class="col-sm-6">
											    	<label>Last name <span class="require">*</span></label>
											      	<input type="text" class="form-control" id="inputPassword">
											    </div>
											</div>
										  	<div class="form-group row">
											    <div class="col-sm-6">
											      	<label>Date of birth <span class="require">*</span></label>
											      	<input type="text" class="form-control" id="inputPassword">
											    </div>
											    <div class="col-sm-6">
											      	<label>Nationality <span class="require">*</span></label>
											      	<input type="text" class="form-control" id="inputPassword">
											    </div>
											</div>
											<div class="form-group row">
											    <div class="col-sm-6">
											      	<label>Mobile phone <span class="require">*</span></label>
											      	<input type="text" class="form-control" id="inputPassword">
											    </div>
											    <div class="col-sm-6">
											      	<label>Email <span class="require">*</span></label>
											      	<input type="text" class="form-control" id="inputPassword">
											    </div>
											</div>
											<div class="form-group row">
										  		<div class="col-sm-12">
										  			<label>Address </label>
										    		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										    	</div>
										  	</div>
										  	<div class="form-group row">
										  		<div class="col-sm-12">
										  			<div style="background: #f5f5f5;padding: 20px;">
										  				<table style="width: 100%" cellpadding="5">
										  					<tr>
										  						<td style="width: 40%; text-align: right;">Resume</td>
										  						<td style="width: 60%; text-align: left;"><input type="file" class="form-control-file" id="exampleFormControlFile1"></td>
										  					</tr>
										  					<tr>
										  						<td colspan="2" style="text-align: center;font-size: 14px; font-weight: 200;">Attach file (Maximun file: 2MB The .doc, .docx and .pdf are allowed.)</td>
										  					</tr>
										  				</table>
										  			</div>
										    	</div>
										  	</div>
										  	<button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
										</form>
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