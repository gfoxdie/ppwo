<?php
	$jumlahtot = 0;	
	if($oid >0){
		foreach($bkk as $bbkdata){
			$dibayarke 	= $bbkdata->dibayar_ke;
			$btb		= $bbkdata->bpb;
			$bpb		= $bbkdata->btb;
			$no_faktur	= $bbkdata->no_faktur;
			$objectid 	= $bbkdata->objectid;
			$supplier	= $bbkdata->supplier;
		}
		//$jumlahtot = $bkkjum;
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
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
                <div class="card">
					<form method="post" action="<?php echo base_url(); ?>bkk/simpanbkk" class="form-horizontal"  enctype="multipart/form-data">
						
                        <div class="card-content">
							<h4><strong>Bukti Kas Keluar</strong></h4>
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
								
								<input type="submit" class="btn btn-primary btn-round pull-right" name="submit" value="submit"></input>
							</div>
						</div>
                    </form>
                </div>
			</div>
         </div>
		 <div class="row">
            <div class="col-md-10">
				<div class="card">
					<form method="post" action="<?php echo base_url(); ?>bkk/simpanbkk_det" class="form-horizontal"  enctype="multipart/form-data">
						<div class="card-content">	
							<div class="row">
								<input type="hidden" name="parentobjectid" id="parentobjectid" class="form-control" value="<?php echo $objectid; ?>">
							</div>
							<div class="row">
								<table class="table table-striped">
                                    <thead class="text-primary">
										<th>Keterangan</th>
										<th>Jumlah</th>
										<th>Catatan</th>
										<th>Nota Pengganti</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="keterangan" id="keterangan" class="form-control"></td>
											<td><input type="text" name="jumlah" id="jumlah" class="form-control"></td>
											<td><input type="text" name="catatan" id="catatan" class="form-control"></td>
											<td><input type="text" name="pengganti_nota" id="pengganti_nota" class="form-control"></td>
                                        </tr>
										<?php
											if($oid >0){
												foreach($bkkdet as $bkkdetail){
													$jumlahtot = $jumlahtot + $bkkdetail->jumlah;
													echo"<tr>
														<td>".$bkkdetail->keterangan."</td>
														<td>".number_format($bkkdetail->jumlah,0,",",".")."</td>
														<td>".$bkkdetail->catatan."</td>
														<td>".$bkkdetail->pengganti_nota."</td>
													</tr>";	
												}
											}
										?>
									</tbody>
								</table>
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
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>