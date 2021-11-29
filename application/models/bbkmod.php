<?php defined('BASEPATH') or exit('No direct script access allowed');
	class bbkmod extends CI_Model
	{
		private $_table = 'bukti_keluar';
		
		public function rules(){
			return[
				['field' => 'dibayar_ke',
				 'label' => 'Dibayar Ke',
				 'rules' => 'required'],
			];
		}
		
		  //----------------------------------------------------------------
		  // PROCESS HEADER BBK
		  //----------------------------------------------------------------
		
		public function simpanbbk(){
			$post = $this->input->post();
			$this-> tgl_bk    		= date("Y-m-d");
			$this-> tgl_aktivity	= date("Y-m-d");
			$this-> dibayar_ke 		= $post["dibayar_ke"];
			$this->	btb 			= $post["btb"];
			$this->	bpb 			= $post["bpb"];
			$this->	no_faktur 		= $post["no_faktur"];
			$this->	supplier 		= $post["supplier"];
			$this-> trans 			= 2;
			$this->db->insert($this->_table, $this);
			return $this->db->insert_id();
			
			
		}
		
		
		public function getbyid($id){
			return $this->db->get_where($this->_table,["objectid" =>$id])->result();
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