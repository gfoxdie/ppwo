<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<div class="main-content">
    <div class="main-content-inner">
       

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Form WO Online
                    <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Overview &amp; Work Order IT
                    </small>
                </h1>
            </div><!-- /.page-header -->
                <form name="f_wo" action="<?php base_url()?>wo_con/simpan_wo" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
                    <?php
                
            ?>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor WO</label>
                <div class="col-sm-9">
                    <input type="text" id="form-field-1" name="txtnowo" value="<?php echo $nowo; ?>" readonly>  <input type="hidden" name="txtno" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemohon</label>
                <div class="col-sm-6">
                    <input type="text" id="txtpemohon" style="width:30%" name="txtpemohon" value="<?php echo $usernm; ?>" class="col-xs-10 col-sm-5" readonly />
                    <label style='margin-left: 5px;' id=pesan1></label>
                    <button type="button" class="btn btn-xs btn-danger" id="tampil-an">A/n <i class="ace-icon glyphicon glyphicon-plus icon-on-left"></i></button>
                    <button type="button" class="btn btn-xs btn-success" id="sembunyian">A/n <i class="ace-icon glyphicon glyphicon-minus icon-on-left"></i></button>
                    <input type="text" id="an" style="width:30%" name="an"  class="an col-xs-10 col-sm-5" placeholder="Atas nama"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>
                <div class="col-sm-7">
                <input type="text" id="form-field-1" class="col-xs-10 col-sm-3" name="txtsection" value="<?php echo $section ?>" readonly>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ditujukan (HARAP DIPILIH)</label>
            <div class="col-sm-9">
                <select name="radio" id="radio" required>
                    <option value="">--PILIH--</option>
                        <?php 
                            foreach($tujuan as $dest){
                               echo'<option value="'.$dest->nama_section.'">'.$dest->nama_section.'</option>'; 
                            } 
                    ?>
                </select>
                <br>
                <br>
                <ul id="jobinf"> 
                    <li><b> pekerjaan Infrastruktur:</b></li>
                    <li>Jaringan</li>
                    <li>Hardware</li>
                    <li>Software (Office, Antivirus)</li>
                    <li>OS</li>
                </ul>
               
                <ul id="jobpro"> 
                    <li><b> pekerjaan programmer :</b></li>
                    <li>Aplikasi/software/sistem</li>
                    <li>Databases</li>
                    <li>Qad</li>
                    <li>Report</li>
                </ul>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis permohonan</label>
            <div class="col-sm-9">
                <select name='prm' id='prm'>
                    <option value=''>--PILIH--</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Permohonan</label>
            <div class="col-sm-9">
                <select name="sub_category" id="sub_category" required>
                    <option value="">--PILIH--</option>
                   
                </select>
                <br>
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kepala divisi</label>
            <div class="col-sm-2">
        
            <select class="chosen-select " id="kadiv" name="kadiv" style="width:80%">
                    <option value="" selected>--PILIH--  </option>
                <?php
                    foreach($kadiv as $kdv){
                       echo"<option value='".$kdv->username."'>".$kdv->nama."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Uraian Pekerjaan</label>
            <div class="col-sm-9">
                <textarea rows="3" cols="35 " id="txturaian"  name="txturaian"  required></textarea>
                <label style='margin-left: 5px;' id="pesan2"></label>
            </div>
        </div>
                <!--
                 <div class="form-group"> <?php
                    $z=1;
                    foreach($jenisakses as $jenak){
                ?>
                        <label>
                        <input name="aks[]" id="" type="checkbox" class="ace" value="<?php echo $jenak->idakses ;?>"/>
                        <span class="lbl"> <?php echo $jenak->jenis_akses;?></span>
                        </label>
                        
                        <?php $z++;
                        $t=$z-1;
                        if($t %5===0){
                            echo "<br>";
                        }
                    } 					
                ?> 
                <input type="hidden" name="jmlakses" id="jmlakses" value="<?php /*echo $x-(1);8*/?>">
            </div>
        </div-->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sifat Akses</label>
            <div class="col-sm-9">
                <select name="sifat" id="sifat" required>
                    <option value="">--PILIH--</option>
                    <option value="Sementara">Sementara</option>
                    <option value="Permanen">Permanen</option>
                </select>
            </div>
        </div>

        <div class="form-group" id="tampil-exp" class="tampil-exp">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sampai</label>
            <div class="col-sm-2">
                <input class="form-control date-picker" id="exp" name='exp' type="text" data-date-format="yyyy-mm-dd" autocomplete="off" />
            </div>
        </div>
        
        </div>
        
        
        
        <center>
        <table>
        <tr>
        <td>
        
        <button class="btn btn-info" type="submit">
        <i class="ace-icon fa fa-check bigger-110"></i>
        Submit
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
        </div>
        </form>
        
        <div class="col-md-12">
        
        <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
        <!-- -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:1100px">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail WO</h4>
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
        <?php 
        //pembagian tampilan tabel berdasar hak akses
        if ($level=='usr') {
            ?>
            
            
            </form>		
            <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
            
            <tr>
            <th data-sortable="true">No.</th>
            <th  data-sortable="true">Nomor WO</th>
            <th  data-sortable="true">Pemohon</th>
            <th  data-sortable="true">Section</th>
            <th  data-sortable="true">Status</th>
            </tr>
            
            </thead>
            <?php
                $no =1;        
                foreach($wproc as $wpc){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    ?>
                    <td><a href="#" class="edit-record" data-id="<?php echo $wpc->no_wo; ?>" ><?php echo $wpc->no_wo; ?></a></td>
                    <?php
                    echo '<td>'.$wpc->pemohon.'</td>';
                    echo '<td>'.$wpc->section.'</td>';
                    echo '<td>'.$wpc->status_wo.'</td>';
                    
                    echo '</tr>';
                    
                    $no++;
                }
            
            ?>
            </table>
            <?php 
        } else if ($level=='sh') {					
            ?>
            <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
            
            
            <tr>
            <th data-sortable="true">No.</th>
            <th  data-sortable="true">Nomor WO</th>
            <th  data-sortable="true">Pemohon</th>
            <th  data-sortable="true">Status</th>
            <th  data-sortable="true">Action</th>
            </tr>
            
            </thead>
            <?php
            require_once("config.php");
            //~ echo $nopp;
            /* $result="select * from tbl_wo where section ='".$sec."' and status_wo not in('finish') and pls='$pls' order by status_wo DESC";
            $query_input=mysqli_query($koneksi,$result);
            if ($query_input){
                // mengulangi data agar tidak hanya 1 yang tampil
                $no = 1;
                while($data = mysqli_fetch_array($query_input)){ */
                foreach($wooustd as $wostd){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>'; ?>
                    <td><a href="#" class="edit-record" data-id="<?php echo $wostd->no_wo; ?>" ><?php echo $wostd->no_wo; ?></a></td>
                    <?php
                    echo '<td>'.$wostd->pemohon.'</td>';
                    echo '<td>'.$wostd->status_wo.'</td>';
                    if ($wostd->status_wo == 'waiting'){
                        echo '<td><a href="app_wo.php?nowo='.$wostd->no_wo.'" class="btn  btn-minier btn-primary">
                        <i class="ace-icon fa fa-pencil-square-o"></i>
                        APPROVE
                        </a></td>';
                    }else if (($wostd->status_wo == 'approved SH') or ($wostd->status_wo == 'on process') or ($wostd->status_wo == 'finish') or ($wostd->status_wo == 'complete')){
                        echo '<td><a href="app_wo.php?nowo='.$wostd->no_wo.'" class="btn  btn-minier btn-primary" disabled>
                        <i class="ace-icon fa fa-pencil-square-o"></i>
                        APPROVE
                        </a></td>';
                    }
                    $no++;
                    echo '</tr>';
                }
            
            ?>
            </table>
            <?php 
        } else if ($level=='tek') {					
            ?>
            
            <?php 	if(isset($_POST['tombolwoost'])){
                
                $stt =$_POST['stt'];
                $dev =$_POST['dev'];
                $tglf=$_POST['tglf'];
                $tglt=$_POST['tglt'];
                $cariwo=$_POST['cariwo'];
                $group="WO";
                
                if($cariwo<>'')
                {
                    $inputdata .="and no_wo='$cariwo' ";
                }else{}
                if($stt<>'')
                {
                    $inputdata .="and status_wo='$stt' ";
                }else{}
                if($dev<>'')
                {
                    $inputdata .="and it='$dev' ";
                }else{}
                if($tglf<>'')
                {
                    $inputdata .="and tgl_permohonan between '$tglf' and '$tglt' ";
                }else{}
                
                ?>
                
                <form action="form-wo.php" method="post" name="ostwo" id="ostwo">
                <table style="float:righr;">
                <tr>
                <td>WO</td>
                <td><input type="text" name="cariwo" id="cariwo" ></td>
                <td>Status</td>
                <td><select name="stt" id="stt">
                <option value="">--Pilih--</option>
                <option value="waiting">Waiting</option>
                <option value="on process">on process</option>
                <option value="status">Hold</option>
                <option value="finish">Finish</option>
                </select></td>
                <td>Dev</td>
                <td><select name="dev" id="dev">
                <option value="">--Pilih--</option>
                <option value="infra">Infrastruktur</option>
                <option value="prog">Programmer</option>
                
                </select></td>
                <td>From</td>
                <td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
                <td>To</td>
                <td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
                <td><input type="submit" name="tombolwoost" class="btnost btn btn-primary" style="border-radius:5px;" value="Status WO"></td>
                <td><a href="export_ostanding.php?tglf=<?php echo $tglf; ?>&tglt=<?php echo $tglt; ?>&stt=<?php echo $stt; ?>&dev=<?php echo $dev; ?>&group=<?php echo $group; ?>&pls=<?php echo $pls; ?>" style="border-radius:5px;" class="btn btn-success"><i class="ace-icon fa fa-cloud-download"></i>Export WO</a></td>
                
                </tr></table>
                </form>
                <br><br><br>
                <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                
                <tr>
                <th data-sortable="true">No.</th>
                <th  data-sortable="true">Nomor WO</th>
                <th  data-sortable="true">Pemohon</th>
                <th  data-sortable="true">Section</th>
                
                <th  data-sortable="true">Tgl permohonan</th>
                <th  data-sortable="true">pemohon</th>
                <th  data-sortable="true">It</th>
                <th  data-sortable="true">Status</th>
                </tr>
                
                </thead>
                <?php
                require_once("config.php");
                //$result="select * from tbl_wo where no_wo !=0 $inputdata ";
                $query_input=mysqli_query($koneksi,"select * from tbl_wo where no_wo !=0 $inputdata and pls='$pls' ");
                if ($query_input){
                    // mengulangi data agar tidak hanya 1 yang tampil
                    $no = 1;
                    while($data = mysqli_fetch_array($query_input)){
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        ?>
                        <td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
                        <?php
                        echo '<td>'.$data['pemohon'].'</td>';
                        echo '<td>'.$data['section'].'</td>';
                        
                        echo '<td>'.$data['tgl_permohonan'].'</td>';
                        echo '<td>'.$data['pemohon'].'</td>';
                        echo '<td>'.$data['it'].'</td>';
                        echo '<td>'.$data['status_wo'].'</td>';
                        
                        echo '</tr>';
                        
                        $no++;
                    }
                }
                ?>
                </table>
                <?php 
            } else{?>
                
                
                <form action="form-wo.php" method="post" name="ostwo" id="ostwo">
                    <table style="float:right;">
                        <tr>
                        <td>NO WO</td>
                        <td><input type="text" name="cariwo" id="cariwo"></td>
                        <td>Status</td>
                        <td><select name="stt" id="stt">
                        <option value="">--Pilih--</option>
                        <option value="waiting">Waiting</option>
                        <option value="on process">on process</option>
                        <option value="status">Hold</option>
                        <option value="finish">Finish</option>
                        </select></td>
                        <td>Dev</td>
                        <td><select name="dev" id="dev">
                        <option value="">--Pilih--</option>
                        <option value="infra">Infrastruktur</option>
                        <option value="prog">Programmer</option>
                        
                        </select></td>
                        <td>From</td>
                        <td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
                        <td>To</td>
                        <td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
                        <td><input type="submit" name="tombolwoost" class="btnost btn btn-primary" style="border-radius:5px;" value="Status WO"></td>
                        
                        </tr>
                    </table>
                </form>
                <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                    
                    <tr>
                    <th data-sortable="true">No.</th>
                    <th  data-sortable="true">Nomor WO</th>
                    <th  data-sortable="true">Pemohon</th>
                    <th  data-sortable="true">Section</th>
                    
                    <th  data-sortable="true">Tgl permohonan</th>
                    <th  data-sortable="true">pemohon</th>
                    <th  data-sortable="true">It</th>
                    <th  data-sortable="true">Status</th>
                    </tr>
                    
                    </thead>
                    <?php
                        require_once("config.php");
                        $result="select * from tbl_wo where status_wo not in('finish') and pls='$pls'";
                        $query_input=mysqli_query($koneksi,$result);
                        if ($query_input){
                            // mengulangi data agar tidak hanya 1 yang tampil
                            $no = 1;
                            while($data = mysqli_fetch_array($query_input)){
                                echo '<tr>';
                                echo '<td>'.$no.'</td>';
                                ?>
                                <td><a href="#" class="edit-record" data-id="<?php echo $data['no_wo']; ?>" ><?php echo $data['no_wo']; ?></a></td>
                                <?php
                                echo '<td>'.$data['pemohon'].'</td>';
                                echo '<td>'.$data['section'].'</td>';
                                
                                echo '<td>'.$data['tgl_permohonan'].'</td>';
                                echo '<td>'.$data['pemohon'].'</td>';
                                echo '<td>'.$data['it'].'</td>';
                                echo '<td>'.$data['status_wo'].'</td>';
                                
                                echo '</tr>';
                                
                                $no++;
                            }
                        }
                    ?>
                </table>
            
            <?php 
            }
        } 
            ?>
       
            
            
            
            
            </div><!-- /.main-content -->
            
           
            <script src="<?php echo base_url(); ?>js1/jquery-1.11.1.min.js"></script>
            <script src="<?php echo base_url() ?>/js1/bootstrap.js"></script>
            <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
            <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap.js"></script>
            <script src="<?php echo base_url(); ?>js1/bootstrap-table.js"></script>
            
            <!-- page specific plugin scripts -->
            <script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap-duallistbox.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery.raty.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/typeahead.jquery.min.js"></script>

            




<script>
//Inisiasi awal penggunaan jQuery
$(document).ready(function(){
    //Pertama sembunyikan elemen class gambar
    $('#an').hide(); 
    $('#sembunyian').hide();
    $('#tampil-an').show();        
    
    //Ketika elemen class tampil di klik maka elemen class gambar tampil
    $('#tampil-an').click(function(){
        $('#an').show();
        $('#sembunyian').show(); 
        $('#tampil-an').hide(); 
    });
    
    //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
    $('#sembunyian').click(function(){
        //Sembunyikan elemen class gambar
        $('#an').hide();
        $('#tampil-an').show(); 
        $('#sembunyian').hide();       
    });

            $('#jobinf').hide();
            $('#jobpro').hide();
            //combo ditujukan
            $('select[id="radio"]').change(function() {
                jb 	=$(this).val();
                if(jb=="IT"){
                    $('#jobinf').show();
                    $('#jobpro').hide();
                }else if(jb=="prog")
                {
                    $('#jobinf').hide();
                    $('#jobpro').show();
                }else{
                    $('#jobinf').hide();
                    $('#jobpro').hide();
                }

                var id=$(this).val();
                
                $.ajax({
                    url : "<?php echo site_url('wo_con/getpermintaan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        html += '<option value="">--PILIH--</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_permintaan+'>'+data[i].permintaan+'</option>';
                        }
                        $('#prm').html(html);
 
                    }
                });

            });
            //combo permohonan
            $('select[id="prm"]').change(function() {
                var id=$(this).val();
                var dept = $('#radio').val();
                $.ajax({
                    url : "<?php echo site_url('wo_con/getpermohonan');?>",
                    method : "POST",
                    data : {id: id, dept:dept},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        html += '<option value="">--PILIH--</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].objectid+'>'+data[i].job+'</option>';
                        }
                        $('#sub_category').html(html);
 
                    }
                });
            }); 
});
</script>

<script type=text/javascript>
function kosong()
{	
    var  uraian			= document.getElementById('txturaian');//2
    
    
    if(uraian.value=='')
    {
        document.getElementById('pesan2').innerHTML = "//Detail masalah Harus Diisi";
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
    document.getElementById("txturaian").focus();
}    

</script>







            <script>
            $(function(){
                $(document).on('click','.edit-record',function(e){
                    e.preventDefault();
                    $("#myModal").modal('show');
                    $.post('formwo_modal.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        //~ 
        
        
        </script>
        
        
     
        
        <script>
        $('#sifat').on('change', function() {
            var value = $(this).val();
            if(value=="Sementara"){
                $("#tampil-exp").show();
            }else{
                $("#tampil-exp").hide();
            }
        });
        </script>
        
        <script type="text/javascript">
        jQuery(function($){
            var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
            var container1 = demo1.bootstrapDualListbox('getContainer');
            container1.find('.btn').addClass('btn-white btn-info btn-bold');
            
            /**var setRatingColors = function() {
                $(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
                $(this).find('.star-off-png').removeClass('orange2').addClass('grey');
            }*/
            $('.rating').raty({
                'cancel' : true,
                'half': true,
                'starType' : 'i'
                /**,
                
                'click': function() {
                    setRatingColors.call(this);
                },
                'mouseover': function() {
                    setRatingColors.call(this);
                },
                'mouseout': function() {
                    setRatingColors.call(this);
                }*/
            })//.find('i:not(.star-raty)').addClass('grey');
            
            
            
            //////////////////
            //select2
            $('.select2').css('width','200px').select2({allowClear:true})
            $('#select2-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('.select2').addClass('tag-input-style');
                else $('.select2').removeClass('tag-input-style');
            });
            
            //////////////////
            $('.multiselect').multiselect({
                enableFiltering: true,
                buttonClass: 'btn btn-white btn-primary',
                templates: {
                    button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
                    ul: '<ul class="multiselect-container dropdown-menu"></ul>',
                    filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
                    filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
                    li: '<li><a href="javascript:void(0);"><label></label></a></li>',
                    divider: '<li class="multiselect-item divider"></li>',
                    liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
                }
            });
            
            
            ///////////////////
            
            //typeahead.js
            //example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substringRegex;
                    
                    // an array that will be populated with substring matches
                    matches = [];
                    
                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');
                    
                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function(i, str) {
                        if (substrRegex.test(str)) {
                            // the typeahead jQuery plugin expects suggestions to a
                            // JavaScript object, refer to typeahead docs for more info
                            matches.push({ value: str });
                        }
                    });
                    
                    cb(matches);
                }
            }
            
            $('input.typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'states',
                displayKey: 'value',
                source: substringMatcher(ace.vars['US_STATES'])
            });
            
            
            ///////////////
            
            
            //in ajax mode, remove remaining elements before leaving page
            $(document).one('ajaxloadstart.page', function(e) {
                $('[class*=select2]').remove();
                $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
                $('.rating').raty('destroy');
                $('.multiselect').multiselect('destroy');
            });
            
        });
        </script>
        
        <script type="text/javascript">
        $(document).ready(function(){
            
        });
        
        </script>