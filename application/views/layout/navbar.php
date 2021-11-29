<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Pilih Menu </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Form</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url()?>pp_con">
									<i class="menu-icon fa fa-caret-right"></i>
									Form PP
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url()?>wo_con">
									<i class="menu-icon fa fa-caret-right"></i>
									Form WO
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                    <li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Take</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
							<a href="<?php echo base_url()?>pp_con\take_pp">
									<i class="menu-icon fa fa-cog"></i>
									Permintaan Perbaikan
								</a>
								<b class="arrow"></b>
							</li>
                            <li class="">
							<a href="<?php echo base_url()?>wo_con\take_wo">
									<i class="menu-icon fa fa-file-text"></i>
									Work Order
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="menu_take_modul.php">
									<i class="menu-icon fa fa-file-text"></i>
									Modul
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                    <li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Process</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
                            <li class="">
								<a href="<?php echo base_url()?>pp_con/listprocess_pp">
									<i class="menu-icon fa fa-cog"></i>
									Permintaan Perbaikan
								</a>
        						<b class="arrow"></b>
							</li>
    						<li class="">
								<a href="menu_process_wo.php">
								    <i class="menu-icon fa fa-file-text"></i>
									Work Order
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form_schedule.php">
									<i class="menu-icon fa fa-file-text"></i>
									Schedule
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="menu_process_modul.php">
									<i class="menu-icon fa fa-file-text"></i>
									Modul
								</a>
								<b class="arrow"></b>
							</li>
                        </ul>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>appr_con">
							<i class="menu-icon fa fa-cogs"></i>
							Approval
						</a>
						<b class="arrow"></b>
					</li>
                    <li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">REPORT PROJECT IT</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="view_dailyreport.php">
								    <i class="menu-icon fa fa-file-text"></i>
    								 DAILY REPORT IT
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
						<ul class="submenu">
							<li class="">
								<a href="view_laporan.php">
									<i class="menu-icon fa fa-file-text"></i>
									WEEKS REPORT
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
						<ul class="submenu">
							<li class="">
								<a href="browse_ostanding.php">
									<i class="menu-icon fa fa-file-text"></i>
									OSTANDING
								</a>
                                <b class="arrow"></b>
							</li>
    					</ul>
						<ul class="submenu">
							<li class="">
								<a href="view_trouble.php">
									<i class="menu-icon fa fa-file-text"></i>
										Troubleshooting
								</a>
								<b class="arrow"></b>
							</li>

						</ul>
					</li>
                    <li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon  fa fa-book"></i>
							<span class="menu-text">INVENTORY</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="form_barang_masuk.php">
									<i class="menu-icon fa fa-file-text"></i>
									 BARANG MASUK
								</a>
								<b class="arrow"></b>
                            </li>
						</ul>
						<ul class="submenu">
							<li class="">
								<a href="form_barang_keluar.php">
									<i class="menu-icon fa fa-file-text"></i>
									BARANG KELUAR
								</a>
								<b class="arrow"></b>
							</li>

						</ul>
						<ul class="submenu">
                			<li class="">
				    			<a href="view_stok.php">
									<i class="menu-icon fa fa-file-text"></i>
									STOK
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
      				</li>
                      <li class="">
							<a href="category.php">
								<i class="menu-icon fa fa-plus-square"></i>
								Category
							</a>
							<b class="arrow"></b>
					</li>
					<li class="">
						<a href="view_inventaris.php">
							<i class="menu-icon fa fa-plus-square"></i>
							Inventaris IT
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="form_pc.php">
							<i class="menu-icon fa fa-plus-square"></i>
							Master Komputer
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="cekmaintance.php">
							<i class="menu-icon fa fa-cogs"></i>
							maintenance
						</a>
						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>