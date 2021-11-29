
	
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
    $pls            = $unm->pls;
}
 

$dev=$dev;
$nm=$name;
$pls=$pls;


								

if($dev=='pro'){
$pr=" and jenis_group='Software'";
}else{
$pr="";
}

?>
<br>
<form action="<?php echo base_url(); ?>pp_con/update_pp" method="post">
    <table style="width:100%;margin-left:10px;">
        <tr>
            <td><br> Jenis PP  </td>
            <td>
                <input type="hidden" id="txttake" name="txttake" value="<?php echo $nopp;?>">
                <input type="hidden" id="txtadmin" name="txtadmin" value="<?php echo $nm;?>">
                <br>
                <select name="jenispp" id="jenispp" style="width:80%;" required>
                    <option value="" selected>--PILIH--  </option>
                    <?php
                        foreach($jenis_pp as $jenpp){
                            echo "<option value='".$jenpp->pekerjaan."'>".$jenpp->pekerjaan."</option>" ;
                        }
                    ?>
				</select>
            </td>
        </tr>
        <tr>
            <td><br>Problem</td>
            <td>
                <div>
                    <br>
	                <select class="chosen-select " id="nmkom" name="nmkom" style="width:80%">
                        <option value="" selected>--PILIH--  </option>
	                    <?php
                            foreach($problem as $prob){
                                echo "<option value='".$prob->problem."'>".$prob->problem."</option>" ;
                            }
                        ?>
                    </select>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <button type="sumbit" class="btn btn-primary" id="takepp" name="takepp"  style="width:80px;">TAKE</button>
    </center>
</form>
<br><br>
<br>

<!-- <script>

$(document).ready(function() {
  $("#rt").chosen-select({
    dropdownParent: $("#jenisModal")
  });
});

</script> -->

      
  <script>
		

$(document).on('click','.pilihsf',function(e){
                e.preventDefault();

			$("#apl").chosen({
			 dropdownParent: $("#jenisModal")
			 	
			});

			// $(".chosen-select").trigger("#jenisModal");
		
		})

		
$(document).on('click','#nmkom',function(e){
                e.preventDefault();

			$("#nmkom").chosen({
			 dropdownParent: $("#jenisModal")
			 	
			});

			// $(".chosen-select").trigger("#jenisModal");
		
		})
	</script>
