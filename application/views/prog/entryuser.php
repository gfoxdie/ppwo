<?php
	if($jumrow >0)
	{
		foreach($usraks as $userx){
			$oida 		= $userx->objectid;
			$users	 	= $userx->users;
			$namas	 	= $userx->nama;
			$aksess		= $userx->akses;
			$passw		= $userx->passwords;
			$status		= $userx->status;
			$c1	= (substr($aksess,0,1)=="1" ? "checked": "");
			$c2	= (substr($aksess,1,1)=="1" ? "checked": "");
			$c3	= (substr($aksess,2,1)=="1" ? "checked": "");
			$c4	= (substr($aksess,3,1)=="1" ? "checked": "");
			$c5	= (substr($aksess,4,1)=="1" ? "checked": "");
			$c6	= (substr($aksess,5,1)=="1" ? "checked": "");
			$c7	= (substr($aksess,6,1)=="1" ? "checked": "");
			$c8	= (substr($aksess,7,1)=="1" ? "checked": "");
		}
	}else{
		$oida		= 0;
		$users	 	= "";
		$namas	 	= "";
		$aksess		= "00000000";
		$passw		= "";
		$status		= "";
		$c1	= (substr($aksess,0,1)=="1" ? "checked": "");
		$c2	= (substr($aksess,1,1)=="1" ? "checked": "");
		$c3	= (substr($aksess,2,1)=="1" ? "checked": "");
		$c4	= (substr($aksess,3,1)=="1" ? "checked": "");
		$c5	= (substr($aksess,4,1)=="1" ? "checked": "");
		$c6	= (substr($aksess,5,1)=="1" ? "checked": "");
		$c7	= (substr($aksess,6,1)=="1" ? "checked": "");
		$c8	= (substr($aksess,7,1)=="1" ? "checked": "");
	}
	if($jumrow >0){
		$exect = "updateuser";
	}else{
		$exect = "createuser";
	}
?>
<html>
	<head>
		<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<!--  Material Dashboard CSS    -->
		<link href="<?php echo base_url()?>assets/css/material-dashboard.css" rel="stylesheet" />
		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" />
		<!--     Fonts and icons     -->
		<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/google-roboto-300-700.css" rel="stylesheet" />
		<!--script src="<?php echo base_url()?>assets/js/ace-extra.min.js"></script-->
		
		<style>
			
			.preload-wrapper {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1000;
			background-color:#000;opacity:0.4;filter:alpha(opacity=40);
			}
			#preloader_7 {
			display: block;
			position: relative;
			left: 50%;
			top: 50%;
			width: 150px;
			height: 150px;
			margin: -75px 0 0 -75px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #3498db;
			
			-webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
			animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
			
			z-index: 1001;
			}
			
			#preloader_7:before {
			content: "";
			position: absolute;
			top: 5px;
			left: 5px;
			right: 5px;
			bottom: 5px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #e74c3c;
			
			-webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
			animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
			}
			
			#preloader_7:after {
			content: "";
			position: absolute;
			top: 15px;
			left: 15px;
			right: 15px;
			bottom: 15px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #f9c922;
			
			-webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
			animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
			}
			
			@-webkit-keyframes spin {
			0%   { 
			-webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
			-ms-transform: rotate(0deg);  /* IE 9 */
			transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
			}
			100% {
			-webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
			-ms-transform: rotate(360deg);  /* IE 9 */
			transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
			}
			}
			@keyframes spin {
			0%   { 
			-webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
			-ms-transform: rotate(0deg);  /* IE 9 */
			transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
			}
			100% {
			-webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
			-ms-transform: rotate(360deg);  /* IE 9 */
			transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
			}
			}
			
		</style>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript">
			$(window).load(function() { $(".preload-wrapper").fadeOut("slow"); })
		</script>
		<script type="text/javascript">
			
			$(window).load(function() { $(".preload-wrapper").fadeOut("slow"); })
			
		</script>
		
		
	</head>
	<body>	
		
		<div class="preload-wrapper">
			<div id="preloader_7"></div>
			
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>	
		<form action="<?php echo base_url().'userakses/'.$exect; ?>" method="post" class="form-horizontal"  enctype="multipart/form-data" >
			<div class="row">
				<h4 class="info-text"></h4>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="picture-container">
						<div class="picture">
							<img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
							<input type="file" id="wizard-picture">
						</div>
						<h6>Choose Picture</h6>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">face</i>
						</span>
						<div class="form-group label-floating">
							<label class="control-label">Akun
								<small>(required)</small>
							</label>
							<input name="oida" id="oida" type="hidden" value="<?php echo $oida; ?>" class="form-control">
							<input name="users" id="users" type="text" value="<?php echo $users; ?>" class="form-control">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">fingerprint</i>
						</span>
						<div class="form-group label-floating">
							<label class="control-label">Kata sandi
								<small>(required)</small>
							</label>
							<input name="passw" id="passw" type="password" value="<?php echo $passw; ?>" class="form-control">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">record_voice_over</i>
						</span>
						<div class="form-group label-floating">
							<label class="control-label">Nama Pengguna
								<small>(required)</small>
							</label>
							<input name="nama" id="nama" type="text" value="<?php echo $namas; ?>" class="form-control">
						</div>
					</div>
				
				</div>
				
			</div>
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="checkbox form-horizontal-checkbox">
						<label>
							<input type="checkbox" name="ck1" <?php echo $c1; ?>> Entry Voucher BKK
						</label>
						<label>
							<input type="checkbox" name="ck2" <?php echo $c2; ?>> Entry Voucher BBK
						</label>
						<label>
							<input type="checkbox" name="ck3" <?php echo $c3; ?>> Assign GL/CCenter/Project BKK
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="checkbox form-horizontal-checkbox">
						<label>
							<input type="checkbox" name="ck4" <?php echo $c4; ?>> Assign No BKK
						</label>
						<label>
							<input type="checkbox" name="ck5" <?php echo $c5; ?>> Assign No BBK
						</label>
						<label>
							<input type="checkbox" name="ck6" <?php echo $c6; ?>> Assign GL/CCenter/Project BBK
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="checkbox form-horizontal-checkbox">
						<label>
							<input type="checkbox" name="ck7" <?php echo $c7; ?>> Laporan
						</label>
						<label>
							<input type="checkbox" name="ck8" <?php echo $c8; ?>> User Akses
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<center>
				
						<button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
				</center>
				</div>
		</form>
		
		
	</body>
</html>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	$("form").submit(function(){
	//alert("Submitted");
	window.parent.location.reload();
	
});	
});
</script>

<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url()?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url()?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url()?>assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url()?>assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url()?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url()?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url()?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url()?>assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url()?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url()?>assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url()?>assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url()?>assets/js/demo.js"></script>
