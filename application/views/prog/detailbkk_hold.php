<?php
	foreach($bkkhold as $bkkh){
		$oida 		= $bkkh->objectid;
		$dibayarke 	= $bkkh->dibayar_ke;
		$nofaktur	= $bkkh->no_faktur;
		$supplier	= $bkkh->supplier;
		$bpb		= $bkkh->bpb;
		$btb		= $bkkh->btb;
		$nobkk		= $bkkh->no_dokumen;
		$daybook	= $bkkh->daybook;
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
	
	<form action="<?php echo base_url(); ?>bkk_hold/daybookbkk" method="post" class="form-horizontal"  enctype="multipart/form-data" >
	<table>
		<tr>
			<td width="150px" style="padding:5px"><b>Dibayar Ke </b></td>
			<td width="20px">:</td>
			<td width="250px"><?php echo $dibayarke; ?></td>
			<td><b>No. BKK :</b></td>
			<td><input type="text" name="oida" id="oida" value="<?php echo $oida; ?>"><input type="text" name="nobkk" id="nobkk" value="<?php echo $nobkk; ?>"></input></td>
			<td>&nbsp;&nbsp;</td>
			<td><button type="submit" class="btn btn-info" name="submit" id="submit" value="simpan" data-dismiss="modal">simpan</button></td>	
		</tr>
		<tr>
			<td width="150px" style="padding:5px"><b>No. Faktur </b></td>
			<td width="20px">:</td>
			<td width="250px"><?php  echo $nofaktur; ?></td>
			<td><b>Daybook :</b></td>
			<td><input type="text" name="daybook" id="daybook" value="<?php echo $daybook; ?>"></input></td>
		</tr>
		<tr>
			<td width="150px" style="padding:5px"><b>Supplier </b></td>
			<td width="20px">:</td>
			<td width="250px"><?php echo $supplier; ?></td>
			<td></td>
		</tr>
		<tr>
			<td width="150px" style="padding:5px"><b>BPB </b></td>
			<td width="20px">:</td>
			<td width="250px"><?php echo $bpb; ?></td>
			<td width="80px"><b>BTB : </b></td>
			<td><?php echo $btb; ?></td>
		</tr>
	</table>
	</form>
	<table class="table table-striped mb-0">
		<tr>
			<th>No.</th>
			<th>Keterangan</th>
			<th>No. GL</th>
			<th>Cost Center</th>
			<th>Project</th>
			<th>Jumlah</th>
		</tr>
			<form action="<?php echo base_url(); ?>bkk_hold/updatebkk" method="post" class="form-horizontal"  enctype="multipart/form-data" >
			<?php
				$nom = 0;
				$jumtot =0;
				foreach($detbkkhold as $detbkkh){
					$nom = $nom + 1;
					$parentid = $detbkkh->parentobjectid;
					$jumtot = $jumtot + $detbkkh->jumlah;
					echo"<tr>";
					echo"<td>".$nom."</td>";
					echo"<td>".$detbkkh->keterangan."</td>";
					echo"<td><input type='text' style='width:150px' name='gl$nom' id='gl$nom' value='".$detbkkh->no_perkiraan."'></input></td>";
					echo"<td><input type='text' style='width:150px' name='cost$nom' id='cost$nom' value='".$detbkkh->cost_center."'></input></td>";
					echo"<td><input type='text' style='width:150px' name='proj$nom' id='proj$nom' value='".$detbkkh->project."'></input>
							<input type='hidden' style='width:150px' name='objid$nom' id='objid$nom' value='".$detbkkh->objectid."'></input></td>";
					echo"<td>".number_format($detbkkh->jumlah)."</td>";	
					echo"</tr>";
				}
				echo"<tr><td/><td/><td/><td/><td/><td><b>".number_format($jumtot)."</b></td></tr>";
				echo"<tr>
						<td colspan='6'>
							<input type='hidden' name='parent' id='parent' value='".$detbkkh->parentobjectid."'></input>
							<input type='hidden' name='jtot' id='jtot' value='".$nom."'/>
						</td>
					</tr>"
			?>
				<tr><td><button type="submit" class="btn btn-info" name="submit" id="submit" value="simpan" data-dismiss="modal">simpan</button></td></tr>
			</form>
		
	</table>
	
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
