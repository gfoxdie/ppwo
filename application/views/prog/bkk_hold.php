

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
			<div class="col-md-12">
				<div class="card">
					 <div class="card-content">
						<!--h4><strong>Bukti Bank Keluar</strong></h4-->
						<div class="row">
							<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" style="width:100%" width="100%">
								<thead>
									<tr>
										<th style="min-width: 100px; font-weight: bold;">Tgl Dokument</th>
										<th style="min-width: 100px; font-weight: bold;">Di Bayar Ke</th>
										<th style="min-width: 100px; font-weight: bold;">No. BPB</th>
										<th style="min-width: 100px; font-weight: bold;">No. BTB</th>
										<th style="min-width: 100px; font-weight: bold;">No. Faktur</th>
										<th style="min-width: 100px; font-weight: bold;">Total</th>
										<th style="min-width: 100px; font-weight: bold;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									
										<?php
											foreach($bkkhold as $bkkh){
												echo"<tr>";
												echo"<td>".$bkkh->tgl_bk."</td>";
												echo"<td>".$bkkh->dibayar_ke."</td>";
												echo"<td>".$bkkh->bpb."</td>";
												echo"<td>".$bkkh->btb."</td>";
												echo"<td>".$bkkh->no_faktur."</td>";
												echo"<td>".number_format($bkkh->jumlah,0,",",".")."</td>";
												echo"<td>
														<a href='".base_url()."bkk_hold/vi_entrydetbkk/".$bkkh->objectid."' target='datcer' type='button' rel='tooltip' class='btn btn-primary btn-sm btn-edit' data-toggle='modal'  >Lihat Detail</a>";
												?>	
														<a href="#" type="button" class="btn btn-info btn-sm btn-delete" data-toggle="modal" onclick="deleteConfirm('<?php echo base_url('bkk_hold/batalbkk/'.$bkkh->objectid); ?>')" >Batalkan</a>
												<?php
												echo"</td>"	;
												echo"</tr>";
											}
										?>
									
								</tbody>
							</table>
						</div>
					</div>
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
						<h4 class="modal-title">Edit Detail bkk</h4>
					</div>
					<div class="modal-body">
						<iframe src="<?php echo site_url('layanan/vi_entrycerai/new/0');?>" name="datcer" id="datcer" style="width:100%;" height="550" frameborder=0></iframe>		
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Delete -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Batalkan Voucher?</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">??</span>
			</button>
		  </div>
		  <div class="modal-body">Yakin Voucher BKK akan di batalkan?.</div>
		  <div class="modal-footer">
			<div class="row">
				<div class="col-md-9">
					<a id="btn-delete" class="btn btn-danger" href="#">Ya Batalkan</a>
				</div>
				<div class="col-md-2">
					<a class="btn btn-success" type="button" data-dismiss="modal">Tidak</a>
				</div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	
	
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.datatables.js"></script>
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



<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
			"scrollY": 350,
			"scrollX": true,
			"autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
