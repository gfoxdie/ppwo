<link rel="stylesheet" type="text/css" href="assets/css/animate.css">	 

<?php 

foreach($detpp as $dtpp){
    $nopp           = $dtpp->no_pp;
    $no_antri       = $dtpp->no_antri;
    $pelapor        = $dtpp->pelapor;
    $tgl_lapor      = $dtpp->tgl_lapor;
    $diterima       = $dtpp->diterima;
    $jam_terima     = $dtpp->jam_terima;
    $jam_lapor      = $dtpp->jam_lapor;
    $tgl_terima     = $dtpp->tgl_terima;
    $an             = $dtpp->an;
    $dikerjakan     = $dtpp->dikerjakan;
    $status_pp      = $dtpp->status_pp;
    $status_hold    = $dtpp->status_hold;
    $diketahui_sh   = $dtpp->diketahui_sh;
    $tgl_m_kerja    = $dtpp->tgl_m_kerja;
    $kerusakan      = $dtpp->kerusakan;
    $jam_m_kerja    = $dtpp->jam_m_kerja;
    $tgl_s_kerja    = $dtpp->tgl_s_kerja;
    $jam_s_kerja    = $dtpp->jam_s_kerja;
    $diperiksa      = $dtpp->diperiksa;
    $downtime       = $dtpp->downtime;
}

foreach($usernm as $unm){
    $dev            = $unm->dev;
    $sec            = $unm->section;
	$name			= $unm->nama;
}


?>
<table width="80%">
	<tr>
		<td><h4>Nomor PP</h4></td>
		<td><h4>&nbsp;:&nbsp;</h4></td>
		<td><h4><?php echo $nopp;?></h4></td>
		<td style="width: 30%">&nbsp;</td>
		<td><h4>Nomor Antri</h4></td>
		<td><h4>&nbsp;:&nbsp;</h4></td>
		<td><h4><?php echo $no_antri;?></h4></td>
	</tr>
</table>
<center>
<table width="80%" border="1" class="table table-striped table-bordered table-hover">
	<tr>
		<th colspan="5" style=" background-color:#7EB7FD;">&nbsp;</th>
	</tr>
	<tr>
		<th style="width: 15%;">Pelapor</th><td style="width: 30%;"> <?php echo $pelapor."  (a/n :".$an." )"; ?> </td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th style="width: 18%;">Tanggal Lapor</th><td> <?php echo $tgl_lapor; ?></td>
	</tr>
	<tr>
		<th>Diterima</th><td style="width: 25%;"> <?php echo $diterima;?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Lapor</th><td> <?php echo $jam_lapor; ?></td>
		
	</tr>
	<tr>
		<th>Dikerjakan</th><td><?php echo $dikerjakan;?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Diterima</th><td>
			<?php 
				if($tgl_terima=='0000-00-00'){
					echo "-";
				}else{
					echo $tgl_terima;
				}
			?>
		</td>
	</tr>
	<tr>
		<?php 
			if (($status_hold=='')&&($status_pp=='waiting')){
		?>
				<th>Status PP</th><td><?php echo $status_pp; ?></td>
		<?php 
			}else if (($status_hold=='')&&($status_pp=='on process')or($status_pp=='finish')or($status_pp=='complete')){
		?>
				<th>Status PP</th><td> <?php echo $status_pp; ?></td>
		<?php 
			}else if (($status_hold!='')&&($status_pp=='on process')or($status_pp=='finish')or($status_pp=='complete')){
		?>
				<th>Status PP</th><td> <?php echo $status_pp; ?></td>
		<?php 
			}else { 
		?>
				<th>Status PP/Status Hold</th><td> <?php echo $status_pp."/".$status_hold; ?></td>
		<?php 
			} 
		?>
		<td style="width: 2%;border:0;border-top:0;"></td>
				<th>Jam Diterima</th>
		<td>
			<?php 
				if($jam_terima=='00:00:00'){
					echo "-";
				}else{
					echo $jam_terima;
				}
			?>
		</td>
	</tr>
	<tr>
		<th rowspan="4">Permasalahan Komputer</th>
			<td rowspan="4"><textarea readonly rows="5" cols="29"><?php echo $kerusakan; ?></textarea></td>
			<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Pengerjaan</th><td> 
			<?php 
				if($tgl_m_kerja=='0000-00-00'){
					echo "-";
				}else{
					echo $tgl_m_kerja;
				}
			?>
		</td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Pengerjaan</th>
		<td>
			<?php 
				if($jam_m_kerja=='00:00:00'){
					echo "-";
				}else{
					echo $jam_m_kerja;
				}
			?>
		</td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Finish</th>
		<td>
			<?php 
				if($tgl_s_kerja=='0000-00-00'){
					echo "-";
				}else{
					echo $tgl_s_kerja;
				}
			?>
		</td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Finish</th>
		<td>
			<?php 
				if($jam_s_kerja=='00:00:00'){
					echo "-";
				}else{
					echo $jam_s_kerja;
				}
			?>
		</td>
	</tr>
	<tr>
	<!--  M O D U L PR ------------------------------------------------------------------------------------------------------
	  ----------------------------------------------------------------------------------------------------------------------->
		<td><b>Request PR</b></td>
		<td colspan="4">
			<table class="table table-striped table-bordered table-hover"><tr>
		 		<th>No PR</th>
				<th>Request</th>	
				<th>Barang</th>	
				<th>Jumlah</th>
				<th>Ket</th>
				<th>User Request</th>
				<th>Status</th>				
		 		</tr>
				<tr></tr>
				<?php 
					/*$rq=mysqli_query($koneksi,"select*from  request where no_request='$nopp'");
					while($dtrq=mysqli_fetch_array($rq)){
					?>
						<tr>
							<td><?php echo $dtrq['no_pr']; ?></td>
							<td><?php echo $dtrq['request']; ?></td>
							<td><?php echo $dtrq['nm_barang']; ?></td>
							<td><?php echo $dtrq['jumlah']; ?></td>
							<td><?php echo $dtrq['keterangan']; ?></td>
							<td><?php echo $dtrq['user_request']; ?></td>
							<td><?php if($dtrq['pembuat_pr']=="" and $dtrq['user_approve']==""){
									echo"Proses pembuatan PR";
							}else if($dtrq['pembuat_pr'] !="" and $dtrq['user_approve'] !="" and $dtrq['status'] !="trima")
							{
								echo"on process";
							}else{ echo"Finish";}
							?></td>
						</tr>
						<?php }*/
            	?>
			</table>
		</td>
	<!--  M O D U L PP ------------------------------------------------------------------------------------------------------
	  ----------------------------------------------------------------------------------------------------------------------->
	</tr>
	<tr>
	<!--  M O D U L PP ------------------------------------------------------------------------------------------------------
	  ----------------------------------------------------------------------------------------------------------------------->
		<td><b>Modul PP </b></td>
		
		<td colspan="4">
			<table class="table table-striped table-bordered table-hover">
			<tr><th>Modul</th><th>Status</th><th>IT</th><th>Proses</th></tr>
			<?php /* $cekmod=mysqli_query($koneksi,"select *from modul_pp where no_pp='$nopp'");
					if( !$cekmod){}else{
					while ($dtmod=mysqli_fetch_array($cekmod))
					{
					$usrmodul= $dtmod['dikerjakan'];
					echo"<tr><td>".$dtmod['nama_modulpp']."</td>
							<td>".$dtmod['status']."</td>
							<td>".$dtmod['dikerjakan']."</td>
							<td>";
					if($dev=="inf" OR $dev=="pro"){	
					if($dtmod['status']==''){?>
											
										<form name="f_anal" action="update_modulpp.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $dtmod['objectid'];?>">
								
										<input type="hidden" name="nop" id="nop" value="<?php echo $dtmod['no_pp']?>">
										<input type="hidden" name="sttgroup" id="sttgroup" value="start">
										<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
										<button type="submit" class="btn btn-purple btn-xs">Start</button></form>
										
								<?php }else if($dtmod['status']=='on procces' and $usrmodul==$name){?>
									<form name="f_anal" action="update_modulpp.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $dtmod['objectid'];?>">
									
										<input type="hidden" name="nop" id="nop" value="<?php echo $dtmod['no_pp']?>">
										<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
										<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
										<button type="submit" class="btn btn-primary btn-xs">finish</button></form>
								<?php }else{echo"-";} 
					}else{echo"-";}
					echo"	</td>
						</tr>";
					}
					}
				*/
			?>
			<tr><td></td></tr>
			</table>
		</td>
	<!--  M O D U L PP ------------------------------------------------------------------------------------------------------
	  ----------------------------------------------------------------------------------------------------------------------->
	</tr>

	
	<?php
		/*require_once("config.php");
						$sqlh = mysqli_query($koneksi,"select count('no_pp') as a, deskripsi_kerusakan from dt_pp where no_pp ='".$nopp."'");
						$pkjn = mysqli_fetch_array($sqlh);
						if($pkjn['a']==0){
			echo '<tr>
				<td rowspan="5">&nbsp;</td>
				<td rowspan="5">&nbsp;</td>
				</tr>
			';
			}else {
		?>
		<tr>
			<th rowspan="4">Pekerjaan Yang Dilakukan</th>
				<td rowspan="4"><textarea readonly rows="5" cols="29"><?php
													require_once("config.php");
													$sqlt	=	mysqli_query($koneksi,"select * from dt_pp where no_pp='".$nopp."'");
													while ($datav = mysqli_fetch_array($sqlt)){
														echo $datav['subcategory']." - ".$datav['deskripsi_kerusakan']."\n";
													}
													//~ echo $nopp;
													
												?></textarea>
			</td><?php }
		*/
	?>
		
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Approve Pelapor</th><td> <?php 
							if($diperiksa==''){
									echo "-";
								}else{
									echo $diperiksa;
									}
					?></td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Approve Section Head</th>
		<td><?php 
							if($diketahui_sh==''){
									echo "-";
								}else{
									echo $diketahui_sh;
									}
					?></td>
	</tr>
	
<?php if($sec=="IT"){?>
	<tr>
	<td style="width: 2%;border:0;border-top:0;"></td>
	<th>Downtime</th>: <td><?php echo $downtime;?>  (Mnt)</td>
	</tr>

	<?PHP } ?>
	<?php if(($status_pp=="finish" OR $status_pp=="complete") AND ($usernm=="ssh-it" OR $usernm=="it01")  ){?>
		<!-- <tr>
		
			<td style="width: 2%;border:0;border-top:0;"></td>
			<th>Nilai</th>: 
			<?php 	$sqla_nilai = mysqli_query($koneksi,"select * from nilai_pp where no_pp ='".$nopp."'");
					$data_nilai = mysqli_fetch_array($sqla_nilai);
					
					if($data_nilai['nilai_pp']=='')
					{
						$nilaipp='';
					}else
					{
						$nilaipp=$data_nilai['nilai_pp'];
					}
		
			
					?>
			<td>
				<form action="#" id="n_pp" action="post" name="n_pp" class="n_pp">
				<input type="text" name="nilaibru"  id="nilaibru"  readonly value="<?php echo $nilaipp; ;?>" style="width:50px;" > 
				<input type="text" name="nilai"  id="nilai"  onkeypress="return hanyaAngka(event)"  style="width:50px;"> 
				<button class="_nilaipp btn btn-sm btn-success" name="txttombol" type="button"><i class="ace-icon fa fa-check"></i>SIMPAN</button>

				<input type="hidden" id="id" name="id" value="<?php echo $nopp;?>">
				<input type="hidden" id="txtnama" name="txtnama" value="<?php  echo $diterima;?>">
				<input type="hidden" id="group" name="group" value="PP">
				</form>
			</td>
		
		</tr> -->
	<?php }?>
	</table>

	<br><br>
	<?php
	/*
		if($diterima==$name){
		$ckmodul = mysqli_query($koneksi,"select count(*) as jl from modul_pp where no_pp ='$nopp' and status !='finish'");
		if(!$ckmodul){}else{
		$jml = mysqli_fetch_array($ckmodul);
		
		if($jml['jl'] > 0 ){
			echo "<h5  class='animated infinite fadeOut' style='color:red;'>".$jml['jl']. " Modul Sedang Prosess pengerjaan--</h5>";
 		}else if($jml['jl'] < 1 and $status_pp=='on process'){
			 ?>
				<button type="submit" class="btn btn-primary " onclick="window.open('finish_window.php?kode=<?php echo $nopp;?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=900,height=580');">Finish</button>
	
		<?php }else{} }
		}else{}
		?>


	<?php if($status_pp=="finish" AND $usernm=="ssh-it" ){?>
			<form action="#" id="approv" name="approv">
			<input type="hidden" id="nopp" name="nopp" value="<?php echo $nopp;?>">
			</form>
			<button class="_approvepp btn btn-sm btn-primary" type="button"><i class="ace-icon fa fa-pencil-square-o">APPROVE</i></button>
	<?php }
    */?>

</center>
<br>
<div class="panel-body">
	<div >
		<?php
			if (($status_hold=='')&&($status_pp=='waiting')){
		?>
		<!-- <form name="f_take" action="take_pp.php" method="POST">
		<?php
			echo $name;
		?> -->
		<input type="hidden" name="txttake" value="<?php echo $nopp; ?>">
		<input type="hidden" name="txtadmin" value="<?php echo $name; ?>">
		<!-- <input type="hidden" name="txtkerusahan" value="<?php echo $kerusakan; ?>">
		<input type="hidden" name="txtjenis" value="PP">
		<input type="hidden" name="group_project" value="PERBAIKAN">
		<button type="submit" class="btn btn-primary">TAKE</button> 	
		</form>	 -->
		<center>
		<button type="button" id="take_pp" data-take="<?php echo $nopp; ?>" class="take_pp btn btn-primary btn-xs">TAKE</button>
		</center>
		<?php } else { ?>
		<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		<?php }?>
	</div>
</div>

	<!-- -->
				<div class="panel panel-default">
					
					<div class="panel-body">
						
						<div class="modal fade" id="jenisModal"  role="dialog" aria-labelledby="twoModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width:780px">
					<div class="modal-content">
                    <div class="modal-header" style="background:pink">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <center>   <b><h5 class="modal-title" id="twoModalLabel">JENIS PERMINTAAN PERBAIKAN</h5></b></center><br>
                    </div>
                    <div class="jenismodal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
				</div>
				<!-- -->

		<script src="<?php echo base_url() ?>js1/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url() ?>js1/bootstrap.js"></script>
        <script src="<?php echo base_url() ?>datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>datatables/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url() ?>js1/bootstrap-table.js"></script>

<script>
	function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
	}
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$("._nilaipp").click(function(){
          var data1  =$('#n_pp').serialize();
          var nilai	=$('#nilai').val();
		
		
		 	//  if (nilai>100){
			//  sweetAlert("NILAI MELEBIHI 100", "", "error");
			// }
			//  else if (nilai<1){
			//  sweetAlert("NILAI HARUS DI ISI", "", "error");
			// }else{

		$.ajax({
		type: 'POST',
		url: "simpan_nilai.php",
		data: data1,														
		
		success: function(stok) {
               	swal({ 
					title: "Succes!",
						text: "Nilai Succes",
						type: "success" 
					},
					function(){
						//	  location.reload();
							$('#nilai').val("");
							$('#nilaibru').val(nilai);
							window.location = "app_nilai.php";
							}
							);
			}
		  })//CEK JML
	//	}

		});

	});
</script>


	

<script type="text/javascript">
	$(document).ready(function(){
		$("._approvepp").click(function(){
		
         	var nilai	=$('#nilai').val();
			var nopp	=$('#approv').serialize();
		
		 	//  if (nilai>100){
			//  sweetAlert("NILAI MELEBIHI 100", "", "error");
			// }
			//  else if (nilai<1){
			//  sweetAlert("NILAI HARUS DI ISI", "", "error");
			// }
			//  else if (nilai==''){
			//  sweetAlert("NILAI HARUS DI ISI", "", "error");
			// }
			// else{

		$.ajax({
		type: 'GET',
		url: "pp_complete.php",
		data: nopp,														
		
		success: function(stok) {
              	$( "._nilaipp" ).click();
			   	swal({ 
					title: "Succes!",
						text: "COMPLETE",
						type: "success" 
					},
					function(){
					
							window.location = "app_pp.php";
							//   location.reload();
							}
							);
			}
		  })//CEK JML
	//	}

		});

	});
	</script>


	<script>

	function add_modulpp(){
      var new_chq_no_inf = parseInt($('#total_chq_modulpp').val())+1;
      var new_input_inf="<tr><td><textarea rows='1' cols='82' id='modulpp"+new_chq_no_inf+"' name='modulpp"+new_chq_no_inf+"' class='form-control' onkeyup='cek_query_dok();' onclick='cek_query_dok();' onchange='cek_query_dok();' autocomplete='off'></textarea></td> <td style='vertical-align:TOP' ><button type='button' onclick='add_modulpp()' id='add_modulpp"+new_chq_no_inf+"' class='btn btn-xs btn-success'><i class='glyphicon-plus'></i></button></td><td style='vertical-align:TOP' ><button type='button' onclick='remove_modulpp()' id='remove_modulpp"+new_chq_no_inf+"'  class='btn btn-xs btn-danger'><i class='glyphicon-minus'></i></button></td></tr>";
      $('#new_chq_inf').append(new_input_inf);
      $('#total_chq_modulpp').val(new_chq_no_inf);
    }   
</script>

<script>

    function remove_modulpp(){
	
      var last_chq_no = $('#total_chq_modulpp').val();
      if(last_chq_no>1){
      
        $('#modulpp'+last_chq_no).remove();
       
        $('#add_modulpp'+last_chq_no).remove();
        $('#remove_modulpp'+last_chq_no).remove();
        $('#total_chq_modulpp').val(last_chq_no-1);
      }

    }
</script>



<script type="text/javascript">
	$(document).ready(function(){
		$("#simpan_analis").click(function(){

			


            // var data 			= $('#value_1').val();
              var data           =    $('#fmanalis').serialize();
        
			$.ajax({
				type: 'POST',
				url: 'simpan_plan_wo.php',
				data: data,
				success: function(nopp) {
				
				var [id,group]=nopp.split("|");
					 swal({ 
	                          title: "Transaksi Berhasil!", 
                                    text: "I will close in 2 seconds.",
                                 
                                    type: "success"
	                    });
				  // location.load();
							$('.tampil-analis').load('cek_project.php?id='+id+'&&group='+group);
					
					
					
				}
			});
	
	
		});

	});

	 $(function(){
            $(document).on('click','.take_pp',function(e){
                e.preventDefault();
				
                $("#jenisModal").modal('show');
                $.post('<?php echo base_url() ?>pp_con/modaljenis_pp',
                    {nopp:$(this).attr('data-take')
					 
					
					},
                    function(html){
                        $(".jenismodal-body").html(html);
                    }   
                );
            });
        });
	</script>