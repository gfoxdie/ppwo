<?php defined('BASEPATH') or exit('No direct script access allowed');
	class womod extends CI_Model
	{
		private $_table = 'ppwo';
		private $_table3 = 'section';
		private $_table4 = 'userakses';
		private $_table5 = 'problem';
		private $_table6 = 'jenis_ppwo';
		private $_table7 = 'detail_ppwo';
        private $_table8 = 'jenis_permintaan';
		private $_table9 = 'jenis_akses';

		
		public function rules(){
			return[
				['field' => 'txturaian',
				 'label' => 'Uraian Masalah',
				 'rules' => 'required'],
			];
		}
		
		  //----------------------------------------------------------------
		  // PROCESS HEADER BBK
		  //----------------------------------------------------------------
		
		public function simpanwo(){
			$post = $this->input->post();
			$this-> no_dok    			= $post['txtnowo'];
			$this-> pemohon				= $post['txtpemohon'];
			$this-> tgl_permohonan		= date("Y-m-d");	
			$this-> jam_permohonan		= date("H:i:s");
			$this-> section				= $post["txtsection"];
			$this->	uraian_pekerjaan 	= $post["txturaian"];
			$this-> tertuju				= $post['radio'];
			$this-> an					= $post['an'];
			$this-> status_wo			= "waiting";
			$this-> sifat				= $post['sifat'];
			$this-> kadiv				= $post['kadiv'];
			$this-> exp					= $post['exp'];
			//-------------------------------------------------- cari no antrian
			/* $this->db->select('tbl_pp.section');
			$this->db->from('tbl_pp');
			$this->db->where("tertuju",$post['radio']);
			$this->db->where("tgl_lapor",date('Y-m-d'));
			$rows=$this->db->get();
			$antrian = ($rows->num_rows() + 1);
			
			$this-> no_a 		= $antrian;

			$singkat = $this->db->get_where("section",['nama_section' => $post['radio']])->result();
			foreach ($singkat as $sing){
				$singkatan = $sing->singkatan;
			}
			$this-> no_antri	= $singkatan."-".substr("000".strval($antrian),3)."/".date('m')."/".date('y'); */
			//--------------------------------------------------- cari no antrian
			$this->db->insert($this->_table, $this);
			return $this->db->insert_id();
			
			
		}
				
		public function getnowo($sect){
			$this->db->select('ppwo.section');
			$this->db->from('ppwo');
			$this->db->where("section",$sect);
			$this->db->where("month(tgl_permohonan)",date('m'));
			$this->db->where("year(tgl_permohonan)",date('Y'));
			$rows=$this->db->get();
			return $rows->num_rows();
		}

		public function getsect(){
			return $this->db->get_where($this->_table3,['in_app' => 1])->result();
		}

        public function getkadiv(){
			return $this->db->get_where($this->_table4,['level_user' => 'kadiv'])->result();
		}

        public function get_permintaan($sect){
			return $this->db->get_where($this->_table8,['section'=> $sect]);
		}
		
		public function getjenisakses(){
			return $this->db->get_where($this->_table9)->result();
		}

		public function getwoproses($sect){
			return $this->db->get_where($this->_table,['section' => $sect,'status_wo !='=>'finish' ])->result();
		}

		function getsub_category($category_id, $dept){
			$query = $this->db->get_where('kategori_job', array('idminta' => $category_id, 'section'=> $dept));
			return $query;
		}

		public function getwotahunan($sect){
			$this->db->select('no_pp, tgl_lapor, kerusakan, status_pp, tertuju');
			$this->db->from('tbl_pp');
			$this->db->where("section",$sect);
			//$this->db->where("month(tgl_lapor)",date('m'));
			$this->db->where("year(tgl_lapor)",date('Y'));
			$rows=$this->db->get();
			return $rows->result();
		}

		public function getwooutstd($sect){
			$this->db->select('no_wo, tgl_permohonan, uraian_pekerjaan, status_wo, tertuju');
			$this->db->from('ppwo');
			$this->db->where("section",$sect);
			//$this->db->where("month(tgl_lapor)",date('m'));
			$this->db->where("status_wo !=","finish");
			$rows=$this->db->get();
			return $rows->result();
		}

		public function getwotake($sect){
			$where_in = array('approved by SH','accepted by IT','approved by IT');	
			$this->db->select('no_wo, tgl_permohonan, uraian_pekerjaan, status_wo, tertuju');
			$this->db->from('ppwo');
			$this->db->where("tertuju",$sect);
			$this->db->where_in("status_wo",$where_in);
			//$this->db->where("month(tgl_lapor)",date('m'));
			//$this->db->where("year(tgl_lapor)",date('Y'));
			$rows=$this->db->get();
			return $rows->result();
		}

		public function getdetailwo($nopp){
			
			$this->db->select('no_pp, tgl_lapor, kerusakan, jam_m_kerja, tgl_s_kerja, jam_s_kerja,status_pp,diperiksa,downtime, diketahui_sh,tertuju,no_antri,pelapor,diterima,an,tgl_terima, jam_terima,jam_lapor,dikerjakan,status_hold, tgl_m_kerja ');
			$this->db->from('tbl_pp');
			$this->db->where("no_pp",$nopp);
			//$this->db->where("month(tgl_lapor)",date('m'));
			//$this->db->where("year(tgl_lapor)",date('Y'));
			$rows=$this->db->get();
			return $rows->result();
		}

		public function getuserpp($uname){
			return $this->db->get_where($this->_table4,['username' => $uname])->result();
		}

		public function getproblem($sect){
			return $this->db->get_where($this->_table5,['section' => $sect])->result();
		}

		public function getjenispp($sect){
			return $this->db->get_where($this->_table6,['section' => $sect])->result();
		}

		public function updatepp(){
			$post = $this->input->post();
			
			$tanggal		= date('Y-m-d');
			$jam			= date('H:i:s');			
			$this->	tgl_terima 		= $tanggal;
			$this->	jam_terima 		= $jam;
			$this->	diterima 		= $post["txtadmin"];
			$this->	tgl_m_kerja		= $tanggal;
			$this->jam_m_kerja		= $jam;
			$this->status_pp		= "on process";
			$this->dikerjakan		=$post["txtadmin"];
			$this->jenis_project	=$post["jenispp"];
			$this->komputer			= $post["nmkom"];
			
			return $this->db->update($this->_table, $this, array('no_pp' => $post['txttake']));
			
		}

		public function getppprocs($sect){
			$post = $this->input->post();
			$where_in = array("on process","hold","finish","complete");	
			$this->db->select('no_pp, tgl_lapor, kerusakan, status_pp, tertuju,no_antri, tgl_terima, jenis_project,nama_project');
			$this->db->from('tbl_pp');
			$this->db->where("tertuju",$sect);
			if(isset($post['bulan'])){
				$this->db->where("month(tgl_lapor)",$post['bulan']);
			}
			if(isset($post['tahun'])){
				$this->db->where("year(tgl_lapor)",$post['tahun']);
			}
			$this->db->where_in("status_pp",$where_in);
			//$this->db->where("month(tgl_lapor)",date('m'));
			//$this->db->where("year(tgl_lapor)",date('Y'));
			$rows=$this->db->get();
			return $rows->result();
		}

		public function getmodulpp($nopp){
			return $this->db->get_where($this->_table7,['no_pp' => $nopp])->result();
		}

		public function simpan_modulpp(){
			$result = array();
			$post = $this->input->post();
			if(isset($post['jumlahrow'])){
				$jmrow = $post['jumlahrow'];
				for ($z=1;$z<=$jmrow;$z++){
					$result[] = array(             
						'nama_modulpp' => $post['modulpp'.$z],
						'no_pp' => $post['no_pp'],         
					 );      
				}
			}
			
      		/*foreach ($_POST['nama'] as $key => $val) {
         		$result[] = array(             
            		'nama' => $_POST['nama'][$key],
            		'alamat' => $_POST['alamat'][$key]         
         		);      
      		} */     
      		return $this->db->insert_batch('modul_pp',$result);
			
		}

		public function getppproc($sect){
			$post = $this->input->post();
			$where_in = array("on process","hold","finish","complete");	
			$this->db->select('tbl_pp.no_pp, tbl_pp.tgl_lapor, tbl_pp.kerusakan, tbl_pp.status_pp, tbl_pp.tertuju, tbl_pp.no_antri, tbl_pp.tgl_terima, tbl_pp.jenis_project,tbl_pp.nama_project');
			$this->db->select('count(modul_pp.no_pp) as jmlmod');
			$this->db->from('tbl_pp');
			$this->db->join('modul_pp','modul_pp.no_pp = tbl_pp.no_pp','left');
			$this->db->where("tertuju",$sect);
			$this->db->where_in("status_pp",$where_in);
			
			$this->db->group_by('tbl_pp.no_pp, tbl_pp.tgl_lapor, tbl_pp.kerusakan, tbl_pp.status_pp, tbl_pp.tertuju, tbl_pp.no_antri, tbl_pp.tgl_terima, tbl_pp.jenis_project,tbl_pp.nama_project');
			/*$this->db->limit(1);*/
			$rows=$this->db->get();
			return $rows->result();
			
		}








		public function batalbbk($id){
			$post = $this->input->post();
			$this-> batal = 1;
			$this->db->update($this->_table, $this, array('objectid' => $id));
		
		}
		
		public function daybookbbk(){
			$post = $this->input->post();
			$this-> objectid	 	= $post["oida"];
			$this-> daybook			= $post["daybook"];
			$this->	no_dokumen		= $post["nobbk"];

			
			$this->db->update($this->_table, $this, array('objectid' => $post['oida']));
			return $post["oida"];
			
		}
		
		  //----------------------------------------------------------------
		  // PROCESS DETAIL BBK
		  //----------------------------------------------------------------
		  
		private $_table2 = 'detail_kas_keluar';
		
		public function rulesdetail(){
			return[
				['field' => 'keterangan',
				 'label' => 'Keterangan',
				 'rules' => 'required'],
				['field' => 'jumlah',
				 'label' => 'Jumlah',
				 'rules' => 'required'], 
			];
		}
		
		public function rulesdetailedt(){
			return[
				['field' => 'keteranganedt',
				 'label' => 'Keterangan',
				 'rules' => 'required'],
				['field' => 'jumlahedt',
				 'label' => 'Jumlah',
				 'rules' => 'required'], 
			];
		}
		
		public function simpanbbkdetail(){
			$post = $this->input->post();
			$this-> parentobjectid 	= $post["parentobjectid"];
			$this->	keterangan 		= $post["keterangan"];
			$this->	jumlah 			= $post["jumlah"];
			$this->	catatan 		= $post["catatan"];
			$this->	pengganti_nota	= $post["pengganti_nota"];
			
			$this->db->insert($this->_table2, $this);
			return $post["parentobjectid"];
			
		}
		
		public function editbbkdetail(){
			$post = $this->input->post();
			$this-> objectid	 	= $post["oida"];
			$this-> parentobjectid	= $post["parida"];
			$this->	keterangan 		= $post["keteranganedt"];
			$this->	jumlah 			= $post["jumlahedt"];
			$this->	catatan 		= $post["catatanedt"];
			$this->	pengganti_nota	= $post["notaedt"];
			
			$this->db->update($this->_table2, $this, array('objectid' => $post['oida']));
			return $post["parida"];
			
		}
		//--------------- delete detail bbk -------------------------
		public function deletbbkdetail($id){
			return $this->db->delete($this->_table2, array('objectid' => $id));
		}
		
		//--------------- query data by parentid --------------------
		public function getbyiddetail($id){
			return $this->db->get_where($this->_table2,["parentobjectid" =>$id])->result();
		}
		
		//--------------- get parentid detail bbk --------------------
		public function getparentiddet($id){
			$this->db->select('parentobjectid');
			$this->db->from('detail_kas_keluar');
			$this->db->where("objectid",$id);
			$this->db->limit(1);
			$rows=$this->db->get();
			return $rows->result();
			
		}
		//--------------- get summary jumlah detail bbk ---------------
		public function getsumdetail($id){
			$this->db->select_sum('jumlah');
			$this->db->from('detail_kas_keluar');
			$this->db->where("parentobjectid",$id);
			return $this->db->get();
		}
		
		  //----------------------------------------------------------------
		  // PROCESS DETAIL BBK
		  //----------------------------------------------------------------
		
		public function getbbk_hold(){
			$this->db->select('bukti_keluar.tgl_bk, bukti_keluar.dibayar_ke, bukti_keluar.btb, bukti_keluar.bpb, bukti_keluar.no_faktur, bukti_keluar.objectid');
			$this->db->select_sum('detail_kas_keluar.jumlah');
			$this->db->from('bukti_keluar');
			$this->db->join('detail_kas_keluar','detail_kas_keluar.parentobjectid = bukti_keluar.objectid');
			$this->db->where("detail_kas_keluar.status","H");
			$this->db->where("bukti_keluar.trans","2");
			$this->db->where("bukti_keluar.batal",0);
			$this->db->group_by('bukti_keluar.tgl_bk, bukti_keluar.dibayar_ke, bukti_keluar.btb, bukti_keluar.bpb, bukti_keluar.no_faktur');
			/*$this->db->limit(1);*/
			$rows=$this->db->get();
			return $rows->result();
			
		}
		
		public function getdetbbk_hold($id){
			$this->db->select('bukti_keluar.tgl_bk, bukti_keluar.dibayar_ke, bukti_keluar.btb, bukti_keluar.bpb, bukti_keluar.no_faktur');
			$this->db->select_sum('detail_kas_keluar.jumlah');
			$this->db->from('bukti_keluar');
			$this->db->join('detail_kas_keluar','detail_kas_keluar.parentobjectid = bukti_keluar.objectid');
			$this->db->where("bukti_keluar",$id);
			$rows=$this->db->get();
			return $rows->result();
			
		}
		
		public function savecoabbk(){
			$post = $this->input->post();
			$objectid = $post["objid"];
			$proj     = $post["proj"];
			$index =0;
			foreach($objectid as $dataid){ 
				array_push($data, array(
						'objectid'=>$dataid,
						'project'=>$proj[$index],  
						
				));
      			$index++;
			}
			return $this->db->update_batch($this->_table2, $data, 'objectid');
			
			
		}
		
		public function savecoabbk2(){
		
			$post = $this->input->post();
			$jtot = $post["jtot"];
			for($i=1;$i<=$jtot ;$i++){
				$this->objectid 	= $post["objid".$i];
				$this->project		= $post["proj".$i];
				$this->cost_center	= $post["cost".$i];	
				$this->no_perkiraan = $post["gl".$i];	
				$this->db->update($this->_table2, $this, array('objectid' => $post['objid'.$i]));
			}
			return $post["parent"];
			
		}
		
	}
?>