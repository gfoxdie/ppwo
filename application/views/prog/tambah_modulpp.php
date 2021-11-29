<?php
/*require_once("config.php");
$nopp = $_POST['id'];
$nama_project = $_POST['nama_project'];
$jenis_project = $_POST['jenis_project'];
session_start();
$name = $_SESSION['nama'];*/
?>
<table class="table table-striped table-bordered table-hover" align="center">
    <tr><th>No pp</th><th>Di Kerjakan</th><th>Modul</th><th>Status</th><th>Proses</th></tr>
        <?php 
            /*$cekmod=mysqli_query($koneksi,"select *from modul_pp where no_pp='$nopp'");
			if( !$cekmod){}else{
		    	while ($detailpp=mysqli_fetch_array($cekmod))
			    {*/
                foreach($detpp as $detailpp){
                    
				    $usrmodul= $detailpp->dikerjakan;
                    echo"<tr>
                            <td>".$detailpp->no_pp."</td>
        	                <td>".$detailpp->dikerjakan."</td>
                            <td>".$detailpp->nama_modulpp."</td>
						    <td>".$detailpp->status."</td>
							<td>";
				            if($detailpp->status==''){?>
									<form name="f_anal" action="update_modulpp.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $detailpp->objectid;?>">
									<input type="hidden" name="nop" id="nop" value="<?php echo $detailpp->no_pp?>">
									<input type="hidden" name="sttgroup" id="sttgroup" value="start">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
									<button type="submit" class="btn btn-purple btn-xs">Start</button></form>
                                     <a href="hapus_modulpp.php?obj=<?php echo $detailpp->objectid;?>" style="border-radius:10px;color:red;" onclick="return confirm('Apakah anda yakin ingin mengHapus data ini?');">
                                    <button class="btn btn-danger btn-xs">Batal</button></a>
									
							<?php 
                                }else if($detailpp->status=='on procces' and $usrmodul==$name){
                            ?>
								<form name="f_anal" action="update_modulpp.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $detailpp->objectid;?>">
								
									<input type="hidden" name="nop" id="nop" value="<?php echo $detailpp->no_pp?>">
									<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
									<button type="submit" class="btn btn-primary btn-xs">finish</button></form>
							<?php 
                                }else{
                                    echo"-";
                                } 
				     echo"	</td>
					</tr>";
				}
			
?>
</table>

<H5 style="color:red;">TAMBAH MODUL</H5>

<form action="<?php echo base_url() ?>pp_con/simpanmodulpp" method="POST" name="smodulpp" id="smodulpp">
    <input type="hidden" value="<?php echo $nopp;?>" id="no_pp" name="no_pp">
    <input type="hidden" value="<?php echo $nama_project;?>" id="nama_project" name="nama_project">
    <input type="hidden" value="<?php echo $jenis_project;?>" id="jenis_project" name="jenis_project">
    <table class="table table-striped table-bordered table-hover" align="center">
        
        <tr>
            <th>NO PP</th><th>Modul PP</th>
        </tr>
        <tr>
            <td><b><?php echo $nopp ;?></b></td>
                <input type="hidden" value="1" id="total_chq_modulpp" name="jumlahrow">
            <td colspan="4">
                <textarea name="modulpp1" id="modulpp1" cols="43" rows="1"></textarea>
                <input type ="text" id="dayjml1" name="dayjml1" />
                <button  type="button" onclick="add_modulpp()" class="btn btn-xs btn-success" style="vertical-align:TOP"><i class=" glyphicon-plus"></i></button>
                <button  type="button" onclick="remove_modulpp()" class="btn btn-xs btn-danger" style="vertical-align:TOP"><i class="glyphicon-minus"></i></button>
                <table id="new_chq_inf"></table>
            </td>
            <td></td>
        </tr>
    </table>
    <br>
    <center>
        <input type="submit" name="simpanmodulpp" id="simpanmodulpp" value="SIMPAN" class="btn btn-primary">
    </center>
</form>

<script>

	function add_modulpp(){
      var new_chq_no_inf = parseInt($('#total_chq_modulpp').val())+1;
      var new_input_inf="<tr><td><textarea rows='1' cols='82' id='modulpp"+new_chq_no_inf+"' name='modulpp"+new_chq_no_inf+"' class='form-control' onkeyup='cek_query_dok();' onclick='cek_query_dok();' onchange='cek_query_dok();' autocomplete='off'></textarea></td> <td style='vertical-align:TOP' ><button type='button' onclick='add_modulpp()' id='add_modulpp"+new_chq_no_inf+"' class='btn btn-xs btn-success'><i class='glyphicon-plus'></i></button></td><td style='vertical-align:TOP' ><button type='button' onclick='remove_modulpp()' id='remove_modulpp"+new_chq_no_inf+"'  class='btn btn-xs btn-danger'><i class='glyphicon-minus'></i></button></td></tr>br";
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