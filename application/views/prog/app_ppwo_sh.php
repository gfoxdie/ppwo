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
						<a href="#">Home</a>
					</li>
				<li class="active">Approve Permintaan Perbaikan</li>
			</ul><!-- /.breadcrumb -->

					</div>
		<!-- -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:1000px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Detail PP</h4>
								</div>
								<div class="pp_modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
				
				<!-- -->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog" style="width:1100px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel2">Detail WO</h4>
								</div>
								<div class="WO_modal-body"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				
				<!-- -->
				
		<!-- tampilan 2 row -->
<div class="panel-body">
<div class="row">
				
<div class="col-sm-6">
<div class="panel-heading">List Permintaan Perbaikan</div>
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
							
 <tr>
								<th data-sortable="true">No.</th>
									<th  data-sortable="true">Nomor PP</th>
									<th  data-sortable="true">Nomor Tiket</th>
									<th  data-sortable="true">Status</th>
									<th  data-sortable="true">IT</th>
									<th  data-sortable="true">Action</th>
						    </tr>
							
						    </thead>
							<?php
								$shead = $usernm;
								$no = 1;
								foreach($ppotstd as $ppots){
										$usrpp=$ppots->diterima;
										echo '<tr>';
										echo '<td>'.$no.'</td>';
										?>
										<td><a href="#" class="edit-record" data-id="<?php echo $ppots->no_pp; ?>" ><?php echo $ppots->no_pp; ?></a></td>
										<?php
											echo '<td>'.$ppots->no_antri.'</td>';
											echo '<td>'.$ppots->status_pp.'</td>';
											echo '<td></td>';
											if($ppots->status_pp =='finish'){
												echo '<td>
												<a href="pp_complete.php?nopp='.$ppots->no_pp.'" class="btn  btn-minier btn-primary">
												<i class="ace-icon fa fa-pencil-square-o"></i>
												APPROVE
																						</a></td>';
											}else if ($ppots->status_pp=='complete'){
												echo'<td><button class="btn btn-minier btn-success" disabled>
													<i class="ace-icon fa fa-check"></i>
													Success
												</button></td>';
											}
											echo '</tr>';
										$no++;
								}
	
							 ?>
							</table>
</div>
					
	<div class="vspace-12-sm"></div>				
	<!-- ROW 2 -->
<div class="col-sm-6">
<div class="panel-heading">List Work Order</div>						
<table data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>						
	<tr>
		<th data-sortable="true">No.</th>
		<th  data-sortable="true">Nomor WO</th>
		<th  data-sortable="true">Pemohon</th>
		<th  data-sortable="true">Tgl Pengajuan</th>
		<th  data-sortable="true">IT</th>
		<th  data-sortable="true">Status</th>
		<th  data-sortable="true">Action</th>
	</tr>
</thead>
	<?php
		$shead = $usernm;
		
		
		$no1	=	1;
		
		foreach($wootstd as $wots){
			$usrwo=$wots->diterima;
			
			echo '<tr>';
			echo '<td>'.$no1.'</td>';
			?>
			<td><a href="#" class="edit-record2" data-id="<?php echo $wots->no_wo; ?>" ><?php echo $wots->no_wo; ?></a></td>
			<?php
			echo '<td>'.$wots->pemohon.'</td>';
			echo '<td>'.$wots->tgl_permohonan.'</td>';
			echo '<td></td>';
			echo '<td>'.$wots->status_wo.'</td>';
			if($wots->status_wo=='waiting'){
				echo '<td>
				<a href="app_wo.php?nowo='.$wots->no_wo.'" class="btn  btn-minier btn-primary">
				<i class="ace-icon fa fa-pencil-square-o"></i>
					APPROVE
				</a>
				';
				?>
				&nbsp;
				<button type="submit" class="btn btn-danger btn-minier" onclick="window.open('<?php echo base_url();?>appr_con/rejectsh/kode=<?php echo $wots->no_wo;?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=500,height=580');"><i class="ace-icon fa fa-trash-o"></i> REJECT</button>
				
				</td>
				<?php
				}
			
			$no1++;
			}
	?>
				</table>
		</div>			
</div>

<br><br>
</div>

		<script src="<?php echo base_url(); ?>js1/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url() ?>/js1/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
         <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js1/bootstrap-table.js"></script>
		
		<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('formpp_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".pp_modal-body").html(html);
                    }   
                );
            });
            
            $(document).on('click','.edit-record2',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                $.post('formwo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".WO_modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
       
    </script>