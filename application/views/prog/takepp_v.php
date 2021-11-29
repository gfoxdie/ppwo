<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="main_teknik.php">Home</a>
					</li>
				<li class="active">Waiting List PP</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					List PP Online
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Overview Permintaan Perbaikan IT
					</small>
				</h1>
			</div><!-- /.page-header -->
							
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:900px; height:1000px;">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
								</div>
								<div class="modal-body">
								</div>
								<div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
					        </div>
				        </div>
				    </div>
					<!-- -->
				    <div class="panel panel-default">
						<div class="panel-body">
							<div class="modal fade" id="twoModal" tabindex="-1" role="dialog" aria-labelledby="twoModalLabel" aria-hidden="true">
					            <div class="modal-dialog" style="width:380px">
					                <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="twoModalLabel">Pilih Status Hold</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
					                </div>
				                </div>
				            </div>
				            <!-- -->
					    <div class="panel-body">
							<div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="finishModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width:700px">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="finishModalLabel">Input Pekerjaan</h4>
										</div>
									<div class="modal-body">
								</div>
							<div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
					</div>
				</div>
			</div>
				<!-- -->
				
			<div class="panel-body">
                <table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-sortable="true">No.</th>
							<th  data-sortable="true">Nomor PP</th>
							<th  data-sortable="true">Kerusakan</th>
							<th  data-sortable="true">Status</th>
							<th  data-sortable="true">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i=1;
							foreach($pptake as $tkp){
								echo"<tr>
									<td>".$i."</td>
									<td>".$tkp->no_pp."</td>
									<td>".$tkp->kerusakan."</td>
									<td>".$tkp->status_pp."</td>
									<td>
										<input type='hidden' name='txttake' id='txttake' value='".$tkp->no_pp."'>
										<input type='hidden' name='txtadmin' id='txtadmin' value='".$uname."'>
										<button type='button' class='edit-record btn btn-primary btn-xs' data-id='".$tkp->no_pp."'>TAKE</button>
										<input type='button' class='btn btn-danger btn-xs' onclick=window.open('reject_pp.php?kode='".$tkp->no_pp."','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=500,height=580') value='REJECT'>
									</td>
									</tr>";
								$i++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
					
	</div><!-- /.page-content -->
</div><!-- /.main-content -->


		<script src="<?php echo base_url() ?>js1/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url() ?>js1/bootstrap.js"></script>
        <script src="<?php echo base_url() ?>datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>datatables/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url() ?>js1/bootstrap-table.js"></script>
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url() ?>pp_con/modaltake_pp',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
         $(function(){
            $(document).on('click','.edit-hold',function(e){
                e.preventDefault();
                $("#twoModal").modal('show');
                $.post('hold_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
         $(function(){
            $(document).on('click','.edit-finish',function(e){
                e.preventDefault();
                $("#finishModal").modal('show');
                $.post('finish_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
		
	
</body>
</html>

