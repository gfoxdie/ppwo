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
                <li class="active">Form PP Online</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Form PP Online
                    <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Overview &amp; Permintaan Perbaikan IT
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <form name="f_pp" action="<?php echo base_url(); ?>pp_con/simpan_pp" method="POST" class="form-horizontal" role="form" onsubmit='return kosong();'>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nomor PP</label>
                    <div class="col-sm-9 ">
                        <input type="text" id="form-field-1" class="col-xs-10 col-sm-4"  name="txtnopp" value="<?php echo $nopp; ?>" readonly>  
                        <input type='hidden' name='pls' value='ho'>
                        <input type="hidden" name="txtno" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtsection" class="col-xs-10 col-sm-4" name="txtsection" value="<?php echo $section; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pelapor</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtpelapor" name="txtpelapor"  class="col-xs-10 col-sm-4" value = "<?php echo $usernm; ?>" readonly />
                        <button type="button" class="btn btn-xs btn-danger" id="tampil-an">A/n <i class="ace-icon fa fa-arrow-left icon-on-left"></i></button>
                        <button type="button" class="btn btn-xs btn-success" id="sembunyian">A/n <i class="ace-icon fa fa-arrow-left icon-on-left"></i></button>
                        <input type="text" id="an" style="width:30%" name="an"  class="an col-xs-10 col-sm-5" placeholder="Atas nama"/>
                        <label style='margin-left: 5px;' id=pesan1></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Permasalahan</label>
                    <div class="col-sm-9">
                        <textarea rows="3" cols="35 " id="txtmasalah"  name="txtpermasalahan" required></textarea>
                        <label style='margin-left: 5px;' id="pesan2"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ditujukan ( HARAP DIPILIH )</label>
                    <div class="col-sm-9">
                        <select name="radio" id="radio" required>
                            <option value="">--PILIH--</option>
                            <?php
                                foreach($tujuan as $dest){
                                    //$valdest = $dest->singkatan; 
                                    $labdest = $dest->nama_section;
                                    echo "<option value='$labdest'>$labdest</option>";
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

                <center>
                    <table>
                        <tr>
                            <td>
                                <div id="loadproses">
                                <!-- <p><img src="loader.gif" /> Loading...</p> -->
                                </div>
                                <button class="btn btn-info" type="submit" id="btnsubmit">
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
            </form>
    
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Details</div>
                        <div class="panel-body">    
                            <!-- -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:900px">
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
        

            <!-- -->

            <div class="panel-body">
                <!-- Hasil pencarian----------------------------				 -->


                <form action="form-pp.php" method="post" name="ostpp" id="ostpp">
                    <table style="float:right;">
                        <tr>
                            <td>PP</td>
                            <td><input type="text" name="caripp" id="caripp"></td>
                            <td>Status</td>
                            <td>
                                <select name="stt" id="stt">
                                    <option value="">--Pilih--</option>
                                    <option value="waiting">Waiting</option>
                                    <option value="on process">on process</option>
                                    <option value="status">Hold</option>
                                    <option value="finish">Finish</option>
                                </select>
                            </td>
                            <td>Dev</td>
                            <td>
                                <select name="dev" id="dev">
                                    <option value="">--Pilih--</option>
                                    <option value="infra">Infrastruktur</option>
                                    <option value="prog">Programmer</option>
                                </select>
                            </td>
                            <td>From</td>
                            <td><input type="text" name="tglf" id="tglf"  class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off" ></td>
                            <td>To</td>
                            <td><input type="text" name="tglt" id="tglt" class="form-control date-picker" data-date-format="yyyy-mm-dd" autocomplete="off"  ></td>
                            <td><input type="submit" name="tombol" class="btnost btn btn-primary" style="border-radius:5px;" value="Status PP"></td>
                            <td></td>
                        </tr>
                    </table>
                </form>		
                <br><br><br><br>
                <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">No.</th>
                            <th  data-sortable="true">Nomor PP</th>
                            <th  data-sortable="true">Tgl Lapor</th>
                            <th  data-sortable="true">Kerusakan</th>
                            <th  data-sortable="true">Status</th>
                            <th  data-sortable="true">It</th>
                            <th  data-sortable="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php 
                                foreach($pptahun as $ppthn){
                                    echo"<tr>";
                                        echo"<td>1</td>";
                                        echo"<td>".$ppthn->no_pp."</td>";
                                        echo"<td>".$ppthn->tgl_lapor."</td>";
                                        echo"<td>".$ppthn->kerusakan."</td>";
                                        echo"<td>".$ppthn->status_pp."</td>";
                                        echo"<td>".$ppthn->tertuju."</td>";
                                        echo"";
                                    echo"</tr>";
                                }
                            ?>
                        
                    </tbody>
                </table>
            </div>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
                            

<script src="<?php echo base_url() ?>js1/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url() ?>/js1/bootstrap.js"></script>
<script src="<?php echo base_url() ?>datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url() ?>js1/bootstrap-table.js"></script>








<!-- page specific plugin scripts -->
<script src="<?php echo base_url() ?>assets/js/jquery.bootstrap-duallistbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.raty.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-multiselect.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/typeahead.jquery.min.js"></script>

<!-- ace scripts -->



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
});

//~ 


</script>




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
    $('#jobinf').hide();
    $('#jobpro').hide();
    $('select[id="radio"]').change(function() {
        jb 	=$(this).val();
        if(jb=="infra"){
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
        
    }); 
});

</script>