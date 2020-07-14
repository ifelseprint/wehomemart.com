<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ContactAsset;
ContactAsset::register($this);
?>
<main class="main">
	<div class="contact-posts">
        <div class="contact-banner ">
        	<div class="container-iframe"> 
			  	<iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9114.82752234954!2d101.21407042466335!3d12.96830449231439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sth!4v1594737469564!5m2!1sen!2sth" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
		        							<td class="text"><b>บริษัท เอสซี โฮมมาร์ท จํากัด (สํานักงานใหญ่)</b></td>
		        						</tr>
		        					</table>
		        				</div>
		        				<div class="address">
		        					<table>
		        						<tr>
		        							<td class="icon"></td>
		        							<td class="text">989/1-5 หมู่ 4 ตําบลปลวกแดง อ.ปลวกแดง จ.ระยอง 21140</td>
		        						</tr>
		        					</table>
		        				</div>
		        				<hr>
		        				<div class="tel">
		        					<table>
		        						<tr>
		        							<td class="icon"><i class="fa fa-mobile"></i></td>
		        							<td class="text"><b>Tel :</b> 081-8391818</td>
		        						</tr>
		        					</table>
		        				</div>
		        				<div class="email">
		        					<table>
		        						<tr>
		        							<td class="icon"><i class="fa fa-envelope-o" style="font-size: 12px;"></i></td>
		        							<td class="text"><b>Email :</b> hr@wehomemart.com</td>
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
		        							<td class="text"><b>จ.-อ. ช่วงเวลา 08.00-18.00 น.</b></td>
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
	    						<form>
								  	<div class="form-group row">
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" id="inputPassword" placeholder="ชื่อ">
									    </div>
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" id="inputPassword" placeholder="นามสกุล">
									    </div>
									</div>
								  	<div class="form-group row">
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" id="inputPassword" placeholder="เบอร์โทรศัพท์">
									    </div>
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" id="inputPassword" placeholder="อีเมล">
									    </div>
									</div>
									<div class="form-group row">
								  		<div class="col-sm-12">
								    		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ข้อความ"></textarea>
								    	</div>
								  	</div>
								  	<button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
								</form>
	    					</div>
	    				</div>
	        		</div>
	        	</div>
	        </div>
        </div>
    </div>
</main>