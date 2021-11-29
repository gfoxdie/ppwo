<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<script src="sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script>
  $(document).ready(function()
  {
        $("#loading").hide();
  

  });
  function kosong()
{	
   var  uraian			= document.getElementById('txtalasan');//2
    
   
	if(uraian.value=='')
	{
		document.getElementById('pesan2').innerHTML = "//Detail alasan Harus Diisi";
		uraian.focus();
		return false;
	}
	else
	{
		document.getElementById('pesan2').innerHTML = "";
	}
    
}

function fokus()
	{
		document.getElementById("txtalasan").focus();
	}    

</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Input</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>datatables/dataTables.bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>
		<script src="<?php echo base_url(); ?>jquery-1.11.1.min.js"></script> 
		<script src="<?php echo base_url(); ?>jquery-1.12.3.js"></script> 
		<script type="<?php echo base_url(); ?>text/javascript" src="jquery-2.1.3.min.js"></script>
		<link href="<?php echo base_url(); ?>css1/bootstrap-table.css" rel="stylesheet">
		
		<style>
            .pilih:hover{
                cursor: pointer;
            }
        </style>
		<style>
            .pilih1:hover{
                cursor: pointer;
            }
        </style>
		<style>
            .pilih2:hover{
                cursor: pointer;
            }
        </style>

		
	</head>
	<body class="no-skin" onload="fokus();">

<div class="main-content">
	<div class="main-content-inner">

<?php 
$nowo = $_GET['kode'];
//~ echo $nowo;

require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nowo."'");
$data = mysqli_fetch_array($sqla);

?>
<div class="page-content">
	<div class="page-header">
		<h1>
		WO Online 
		<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		Reject Process
		</small>
		</h1>
	</div>

<div class="panel panel-default">
		<div class="panel-body">
		<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form name="f_rj" action="reject_wo_proses.php" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>
				<div class="col-sm-9">
					<input type="text"  name="txtnowo" class="col-xs-5 col-sm-3" value="<?php echo ''.$nowo.''; ?>" readonly />
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pekerjaan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txturaian" class="col" name="txturaian" readonly><?php echo $data['uraian_pekerjaan'];?></textarea>
					<label style='margin-left: 5px;' id=pesan></label>
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alasan</label>
				<div class="col-sm-9">
					<textarea rows="3" cols="35 " id="txtalasan" class="col" name="txtalasan"></textarea>
					<label style='margin-left: 5px;' id="pesan2"></label>
				</div>
		</div>
	<center>
		<table>
			
			<tr>
			    <td>
					<button class="btn btn-danger" type="submit">
						<i class="ace-icon fa fa-trash bigger-110"></i>
						Reject
					</button>
					&nbsp; 
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</td>
			</tr>
		</table>
		</center>
	</form>
</div>
</div>
		</div>
	</div>
</div>							


    <script src="<?php echo base_url(); ?>js1/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url() ?>/js1/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js1/bootstrap-table.js"></script>

	
	
	<!--
				<td><a href = "javascript:  window.open('s_a_table.php?n=<?php //echo $dataq['status_pp']; ?>', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500');" class = "btn btn-primary">Complete</a></td>
-->
	
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formpp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
				window.open('s_a_table.php?n=complete',
							'winpopup',
							'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=500'
							);
            });
            
        });
        
    </script>
<link rel="stylesheet" href="jquery-ui-1.9.2.css" />
<script src="jquery-1.8.3.js"></script>
<script src="jquery-ui-1.9.2.js"></script>
<script type="text/javascript">
		function hide(){
			document.getElementById('hide1').style.display='none';
			document.getElementById('hide2').style.display='none';
			document.getElementById('hide3').style.display='none';
			document.getElementById('hide4').style.display='none';
			document.getElementById('hide5').style.display='none';
			document.getElementById('hide6').style.display='none';
			document.getElementById('hide7').style.display='none';
			document.getElementById('hide8').style.display='none';
			document.getElementById('hide9').style.display='none';
			document.getElementById('hide10').style.display='none';
			
			}
		var rowCount = 0;
		var num	= 0;
		function addMoreRows(frm) {
			rowCount ++;
			var recRow = '<div class="form-group" id="rowCount'+rowCount+'"><input type="hidden" name="kd_brg'+rowCount+'" id="kd_brg'+rowCount+'"><a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></div></div>';
			jQuery('#addedRows').append(recRow);
			document.getElementById('hasil').value = rowCount;
		}
		
		function show(frm) {
			if (num==0) {
				document.getElementById('hide1').style.display='block';
				num++;
				}else if ((num>=1)&&(num<=9)){
					num++;
					document.getElementById('hide'+num).style.display='block';
					
					}else if (num==10) {
						document.getElementById('hide10').style.display='block';
						}else {
							document.getElementById('btn_tambah').disabled= true;
							}
							document.getElementById('angka').value=num;
			
			}
		
		function remove(a){
			num = num - 1;
			document.getElementById('hide'+a).style.display='none';
			document.getElementById('angka').value=num;
			}
		
		function removeRow(removeNum) {
			jQuery('#rowCount'+removeNum).remove();

		}
		
		
	</script>	
</body>
</html>

