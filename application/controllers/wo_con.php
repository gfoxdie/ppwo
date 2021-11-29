<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wo_con extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('womod');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index(){
		
		$woadd 				= $this->womod;
		$uname 				= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$singkatan 			= $this->session->userdata('singkatan');
		$level	 			= $this->session->userdata('level_user');

		$countwo 			= $woadd->getnowo($section);//? 0 : $woadd->getnopp($section) ;
		$data['nowo'] 		= substr("000".strval($countwo + 1),-3)."/".$singkatan."/WO/".date('m')."/".date('y');
		$data['wooustd'] 	= $woadd->getwooutstd($section);

		//$data['nopp']		= $nopp;
		$data['section'] 	= $section;
		$data['usernm'] 	= $uname;
		$data['level']		= $level;
		$data['tujuan'] 	= $woadd->getsect();
        $data['kadiv'] 	    = $woadd->getkadiv();
        //$data['permintaan'] = $woadd->getpermintaan();
		$data['jenisakses'] = $woadd->getjenisakses();
		$data['wproc'] 		= $woadd->getwoproses($section);

		$this->load->view('layout/header2');
		$this->load->view('layout/navbar2');
		$this->load->view('prog/wo_v',$data);
		$this->load->view('layout/footer2');
    }

	function getpermohonan(){
		$woadd 				= $this->womod;
		$category_id 		= $this->input->post('id',TRUE);
		$dept		 		= $this->input->post('dept',TRUE);
        $data 				= $woadd->getsub_category($category_id, $dept)->result();
        echo json_encode($data);
	}
	
	function getpermintaan(){
		$woadd 				= $this->womod;
		$sect	 		= $this->input->post('id',TRUE);
        $data 				= $woadd->get_permintaan($sect)->result();
        echo json_encode($data);
	}
	function nopp(){
		$woadd 				= $this->womod;
		$section 			= $this->session->userdata('section');
		$singkatan 			= $this->session->userdata('singkatan');

		$countpp 			= $woadd->getnopp($section);//? 0 : $woadd->getnopp($section) ;
		$data['nopp']		= substr("000".strval($countpp + 1),-3)."/".$singkatan."/PP/".date('m')."/".date('y');
	}
	function simpan_wo()
	{
		$woadd 				= $this->womod;
		$ppvalid			= $this->form_validation;
		$ppvalid->set_rules($woadd->rules());
		if($ppvalid->run()){
			$hasil = $woadd->simpanwo();
			$this->session->set_flashdata('success','berhasil disimpan');
			redirect('/wo_con', 'refresh');
		
		}
	}
	

	function take_wo()
	{
		$woadd 				= $this->womod;
		$data['uname']		= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$data['wotake'] 	= $woadd->getwotake($section);
		$this->load->view('layout/header2');
		$this->load->view('layout/navbar2');
		$this->load->view('prog/takewo_v',$data);
		$this->load->view('layout/footer2');
	}

	function modaltake_pp()
	{
		$post 				= $this->input->post();
		$nop		    	= $post['id'];
		$woadd 				= $this->womod;
		$uname 				= $this->session->userdata('username');
		$data['usernm']		= $woadd->getuserpp($uname);
		$data['detpp'] 		= $woadd->getdetailpp($nop);
		$this->load->view('prog/formpp_modal',$data);
	}

	function modaljenis_pp()
	{
		$post 				= $this->input->post();
		$nop		    	= $post['nopp'];
		$woadd 				= $this->womod;
		$uname 				= $this->session->userdata('username');
		$section 			= $this->session->userdata('section');
		$data['usernm']		= $woadd->getuserpp($uname);
		$data['detpp'] 		= $woadd->getdetailpp($nop);
		$data['problem']	= $woadd->getproblem($section);
		$data['jenis_pp']	= $woadd->getjenispp($section);
		$this->load->view('prog/jenis_pp',$data);
	}

	function update_pp(){
		$woadd 				= $this->womod;
		$hasil 				= $woadd->updatepp();
		redirect('/pp_con/take_pp', 'refresh');
	}

	function listprocess_pp()
	{
		$woadd 				= $this->womod;
		$data['uname']		= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$data['ppproc'] 	= $woadd->getppproc($section);
		//$data['getmod'] 	= $woadd->getmodulpp($nopp);
		$this->load->view('layout/header2');
		$this->load->view('layout/navbar2');
		$this->load->view('prog/menu_process_pp',$data);
		$this->load->view('layout/footer2');
	}

	function tambah_modulpp()
	{
		$post 					= $this->input->post();
		$nop		    		= $post['id'];
		$data['jenis_project']	= $post['jenis_project'];
		$data['nama_project']	= $post['nama_project'];
		$woadd 					= $this->womod;
		$uname 					= $this->session->userdata('username');
		$section 				= $this->session->userdata('section');
		$data['nopp']			= $nop;
		$data['usernm']			= $woadd->getuserpp($uname);
		$data['detpp'] 			= $woadd->getmodulpp($nop);
		$data['problem']		= $woadd->getproblem($section);
		$data['jenis_pp']		= $woadd->getjenispp($section);
		$this->load->view('prog/tambah_modulpp',$data);
	}

	function simpanmodulpp()
	{
		$woadd 				= $this->womod;
		$hasil = $woadd->simpan_modulpp();
		
		
	}
}
?>