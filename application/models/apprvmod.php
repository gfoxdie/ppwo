<?php defined('BASEPATH') or exit('No direct script access allowed');
	class apprvmod extends CI_Model
	{
		private $_table = 'tbl_wo';
		private $_table3 = 'section';
		private $_table4 = 'user';
		private $_table5 = 'problem';
		private $_table6 = 'jenis_pp';
		private $_table7 = 'modul_pp';
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
			$this-> no_wo    			= $post['txtnowo'];
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
			
			$this->db->insert($this->_table, $this);
			return $this->db->insert_id();
			
			
		}
				
		
		public function getsect(){
			return $this->db->get_where($this->_table3,['in_app' => 1])->result();
		}

        /*public function getkadiv(){
			return $this->db->get_where($this->_table4,['level_user' => 'kadiv'])->result();
		}

        public function get_permintaan($sect){
			return $this->db->get_where($this->_table8,['section'=> $sect]);
		}
		
		public function getjenisakses(){
			return $this->db->get_where($this->_table9)->result();
		} */

		public function getppappsh($username){
			$datausr = $this->db->get_where($this->_table4,['username' => $username])->row();
			$sect_in = explode("|",$datausr->sect_inapprov);
            $where_in= array("waiting","on process","reject by IT","reject by SH");
            $this->db->select('no_pp, tgl_lapor, kerusakan, status_pp, tertuju,diterima,no_antri');
			$this->db->from('tbl_pp');
			$this->db->where_in("section",$sect_in);
			$this->db->where_in("status_pp",$where_in);
			$rows=$this->db->get();
			return $rows->result();
			
		}

        public function getwoappsh($username){
			$datausr = $this->db->get_where($this->_table4,['username' => $username])->row();
			$sect_in = explode("|",$datausr->sect_inapprov);
            $where_in= array("waiting","on process","reject by IT","reject by SH");
            $this->db->select('no_wo, tgl_permohonan, uraian_pekerjaan, status_wo, tertuju,diterima,pemohon');
			$this->db->from('tbl_wo');
			$this->db->where_in("section",$sect_in);
			$this->db->where_in("status_wo",$where_in);
			$rows=$this->db->get();
			return $rows->result();
			
		}

		/* function getsub_category($category_id, $dept){
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
			$this->db->from('tbl_wo');
			$this->db->where("section",$sect);
			//$this->db->where("month(tgl_lapor)",date('m'));
			$this->db->where("status_wo !=","finish");
			$rows=$this->db->get();
			return $rows->result();
		}

		public function getwotake($sect){
			$where_in = array('approved by SH','accepted by IT','approved by IT');	
			$this->db->select('no_wo, tgl_permohonan, uraian_pekerjaan, status_wo, tertuju');
			$this->db->from('tbl_wo');
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
		}*/

		public function getuserpp($uname){
			return $this->db->get_where($this->_table4,['username' => $uname])->result();
		}

		/* public function getproblem($sect){
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
			
      	 	
      		return $this->db->insert_batch('modul_pp',$result);
			
		}*/

		/* public function getppproc($sect){
			$post = $this->input->post();
			$where_in = array("on process","hold","finish","complete");	
			$this->db->select('tbl_pp.no_pp, tbl_pp.tgl_lapor, tbl_pp.kerusakan, tbl_pp.status_pp, tbl_pp.tertuju, tbl_pp.no_antri, tbl_pp.tgl_terima, tbl_pp.jenis_project,tbl_pp.nama_project');
			$this->db->select('count(modul_pp.no_pp) as jmlmod');
			$this->db->from('tbl_pp');
			$this->db->join('modul_pp','modul_pp.no_pp = tbl_pp.no_pp','left');
			$this->db->where("tertuju",$sect);
			$this->db->where_in("status_pp",$where_in);
			
			$this->db->group_by('tbl_pp.no_pp, tbl_pp.tgl_lapor, tbl_pp.kerusakan, tbl_pp.status_pp, tbl_pp.tertuju, tbl_pp.no_antri, tbl_pp.tgl_terima, tbl_pp.jenis_project,tbl_pp.nama_project');
			
			$rows=$this->db->get();
			return $rows->result();
			
		}

 */






				
	}
?>