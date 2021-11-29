<?php
	$jumlahtot = 0;	
	if($oid >0){
		foreach($bbk as $bbkdata){
			$dibayarke 	= $bbkdata->dibayar_ke;
			$btb		= $bbkdata->bpb;
			$bpb		= $bbkdata->btb;
			$no_faktur	= $bbkdata->no_faktur;
			$objectid 	= $bbkdata->objectid;
			$supplier	= $bbkdata->supplier;
		}
		//$jumlahtot = $bbkjum;
	}else{
		$dibayarke 	= "";
		$btb		= "";
		$bpb		= "";
		$no_faktur	= "";
		$objectid 	= 0;
		$supplier	= "";
		//$jumlahtot	= 0;
	}
?>
<style>
	.my-custom-scrollbar {
	position: relative;
	height: 300px;
	overflow: auto;
	}
	.table-wrapper-scroll-y {
	display: block;
	}	
</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
                <div class="card">
					<form method="post" action="<?php echo base_url(); ?>bbk/simpanbbk" class="form-horizontal"  enctype="multipart/form-data">
						
                        <div class="card-content">
							<!--h4><strong>Bukti Bank Keluar</strong></h4-->
							<div class="row">
								<div class="col-md-5">
									<div class="form-group label-floating">
										<label class="control-label">Dibayar Kepada</label>
                                        <input type="text" name="dibayar_ke" id="dibayar_ke" class="form-control" value="<?php echo $dibayarke; ?>">
                                    </div>
                                </div>
                            </div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group label-floating">
										<label class="control-label">No. Faktur/Kwt/Nota</label>
                                        <input type="text" name="no_faktur" id="no_faktur" class="form-control" value="<?php echo $no_faktur; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
									<div class="form-group label-floating">
										<label class="control-label">No. BPB</label>
                                        <input type="text" name="bpb" id="bpb" class="form-control" value="<?php echo $bpb; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
									<div class="form-group label-floating">
										<label class="control-label">No. BTB</label>
                                        <input type="text" name="btb" id="btb" class="form-control" value="<?php echo $btb; ?>">
                                    </div>
                                </div>
								<div class="col-md-3">
									<div class="form-group label-floating">
										<label class="control-label">Supplier</label>
                                        <input type="text" name="supplier" id="supplier" class="form-control" value="<?php echo $supplier; ?>">
									</div>
                                </div>
                            </div>
							<div class="row">
								
								<input type="submit" class="btn btn-primary btn-round pull-right" name="submit" value="Simpan Header"></input>
							</div>
						</div>
                    </form>
                </div>
			</div>
         </div>
		 <div class="row">
            <div class="col-md-10">
				<div class="card">
					<form method="post" action="<?php echo base_url(); ?>bbk/simpanbbk_det" class="form-horizontal"  enctype="multipart/form-data">
						<div class="card-content">	
							<div class="row">
								<input type="hidden" name="parentobjectid" id="parentobjectid" class="form-control" value="<?php echo $objectid; ?>">
							</div>
							<div class="row">
								<div class="table-wrapper-scroll-y my-custom-scrollbar">
								<table class="table table-striped mb-0">
                                    <thead class="text-primary">
										<th>No.</th>
										<th>Keterangan</th>
										<th>Jumlah</th>
										<th>Catatan</th>
										<th>Nota Pengganti</th>
										<th>Kontrol</th>
                                    </thead>
                                    <tbody>
                                        <tr>
											<td></td>
                                            <td><input type="text" name="keterangan" id="keterangan" class="form-control"></td>
											<td><input type="text" name="jumlah" id="jumlah" class="form-control"></td>
											<td><input type="text" name="catatan" id="catatan" class="form-control"></td>
											<td><input type="text" name="pengganti_nota" id="pengganti_nota" class="form-control"></td>
											<td></td>
                                        </tr>
										<?php
											if($oid >0){
												$i=0;
												foreach($bbkdet as $bbkdetail){
													$jumlahtot = $jumlahtot + $bbkdetail->jumlah;
													$i = $i + 1;
													echo"<tr>
														<td>".$i."</td>
														<td>".$bbkdetail->keterangan."</td>
														<td class='text-right'>".number_format($bbkdetail->jumlah,0,",",".")."</td>
														<td>".$bbkdetail->catatan."</td>
														<td>".$bbkdetail->pengganti_nota."</td>
														<td>
															<a href='#' type='button' rel='tooltip' class='btn btn-success btn-simple btn-edit' data-toggle='modal' data-id='".$bbkdetail->objectid."' data-ket='".$bbkdetail->keterangan."' data-jum='".$bbkdetail->jumlah."' data-nota='".$bbkdetail->pengganti_nota."' data-catat='".$bbkdetail->catatan."' data-parid='".$bbkdetail->parentobjectid."'>
																<i class='material-icons'>edit</i>
															</a>
															"; ?> <a href="#" class="btn btn-danger btn-simple btn-delete" onclick="deleteConfirm('<?php echo base_url('bbk/deletbbk_det/'.$bbkdetail->objectid); ?>')"><i class='material-icons'>close</i></a>
														<?php echo "</td>
													</tr>";	
												}
											}
										?>
									</tbody>
								</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<h4><strong>Total : <?php  echo number_format($jumlahtot,0,",","."); ?></strong></h4>
                                        
                                    </div>
                                </div>
								<div class="col-md-3">
									<input type="submit" class="btn btn-primary btn-round pull-right" name="submit" value="Simpan Detail"></input>
								</div>
							</div>
						</div>
                        
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>

	<!-- Modal Edit -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-dialog modal-lg">	
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Edit Detail BBK</h4>
		  </div>
		  <div class="modal-body">
			<form method="post" action="<?php echo base_url(); ?>bbk/editbbk_det" class="form-horizontal"  enctype="multipart/form-data">
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="col-md-2 label-on-left">Keterangan</label>
						<input type="hidden" name="oida" id="oida" class="form-control">
						<input type="hidden" name="parida" id="parida" class="form-control">
                        <input type="text" name="keteranganedt" id="keteranganedt" class="form-control">
                    </div>
                </div>
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="col-md-2 label-on-left">Jumlah</label>
						<input type="text" name="jumlahedt" id="jumlahedt" class="form-control">
					</div>
                </div>
                <div class="col-md-3">
					<div class="form-group label-floating">
						<label class="col-md-2 label-on-left">Catatan</label>
						<input type="text" name="catatanedt" id="catatanedt" class="form-control">
                    </div>
                </div>
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="col-md-2 label-on-left">Nota Pengganti</label>
                        <input type="text" name="notaedt" id="notaedt" class="form-control">
                    </div>
                </div>
			
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary" name="submit" id="submit" value="Edit Data">Simpan</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Keluar</button>
		  </div>
		  </form>
		</div>
		</div>
	  </div>
	</div>


	<!-- Modal Delete -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
		  <div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
		  </div>
		</div>
	  </div>
	</div>
	
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
			const parid = $(this).data('parid');
            const keterangan = $(this).data('ket');
            const jumlah = $(this).data('jum');
			const catatan = $(this).data('catat');
            const nota = $(this).data('nota');
            // Set data to Form Edit
            $('#oida').val(id);
			$('#parida').val(parid);
            $('#keteranganedt').val(keterangan);
            $('#jumlahedt').val(jumlah);
			$('#catatanedt').val(catatan);
			$('#notaedt').val(nota);
            
            // Call Modal Edit
            $('#myModal').modal('show');
        });

        
        
    });
</script>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
	/*alert("sasas");*/
}
</script>