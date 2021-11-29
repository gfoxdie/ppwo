<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appr_con extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('apprvmod');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index(){
		
		$appradd 			= $this->apprvmod;
        $username			= $this->session->userdata('username'); 	
		$uname 				= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$singkatan 			= $this->session->userdata('singkatan');

		$data['ppotstd'] 	= $appradd->getppappsh($username);
        $data['wootstd'] 	= $appradd->getwoappsh($username);

		//$data['nopp']		= $nopp;
		$data['section'] 	= $section;
		$data['usernm'] 	= $uname;
		$data['tujuan'] 	= $appradd->getsect();

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('prog/app_ppwo_sh',$data);
		$this->load->view('layout/footer');
    }

	function rejectsh($nowo){
		$data['ppotstd'] 	= $appradd->getppappsh($username);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('prog/reject_sh');
		$this->load->view('layout/footer');
	}

	function nopp(){
		$appradd 				= $this->apprvmod;
		$section 			= $this->session->userdata('section');
		$singkatan 			= $this->session->userdata('singkatan');

		$countpp 			= $appradd->getnopp($section);//? 0 : $appradd->getnopp($section) ;
		$data['nopp']		= substr("000".strval($countpp + 1),-3)."/".$singkatan."/PP/".date('m')."/".date('y');
	}
	function simpan_pp()
	{
		$appradd 				= $this->apprvmod;
		$ppvalid			= $this->form_validation;
		$ppvalid->set_rules($appradd->rules());
		if($ppvalid->run()){
			$hasil = $appradd->simpanpp();
			$this->session->set_flashdata('success','berhasil disimpan');
			redirect('/pp_con', 'refresh');
		
		}
	}

	function take_pp()
	{
		$appradd 				= $this->apprvmod;
		$data['uname']		= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$data['pptake'] 	= $appradd->getpptake($section);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('prog/takepp_v',$data);
		$this->load->view('layout/footer');
	}

	function modaltake_pp()
	{
		$post 				= $this->input->post();
		$nop		    	= $post['id'];
		$appradd 				= $this->apprvmod;
		$uname 				= $this->session->userdata('username');
		$data['usernm']		= $appradd->getuserpp($uname);
		$data['detpp'] 		= $appradd->getdetailpp($nop);
		$this->load->view('prog/formpp_modal',$data);
	}

	function modaljenis_pp()
	{
		$post 				= $this->input->post();
		$nop		    	= $post['nopp'];
		$appradd 				= $this->apprvmod;
		$uname 				= $this->session->userdata('username');
		$section 			= $this->session->userdata('section');
		$data['usernm']		= $appradd->getuserpp($uname);
		$data['detpp'] 		= $appradd->getdetailpp($nop);
		$data['problem']	= $appradd->getproblem($section);
		$data['jenis_pp']	= $appradd->getjenispp($section);
		$this->load->view('prog/jenis_pp',$data);
	}

	function update_pp(){
		$appradd 				= $this->apprvmod;
		$hasil 				= $appradd->updatepp();
		redirect('/pp_con/take_pp', 'refresh');
	}

	function listprocess_pp()
	{
		$appradd 				= $this->apprvmod;
		$data['uname']		= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$data['ppproc'] 	= $appradd->getppproc($section);
		//$data['getmod'] 	= $appradd->getmodulpp($nopp);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('prog/menu_process_pp',$data);
		$this->load->view('layout/footer');
	}

	function tambah_modulpp()
	{
		$post 					= $this->input->post();
		$nop		    		= $post['id'];
		$data['jenis_project']	= $post['jenis_project'];
		$data['nama_project']	= $post['nama_project'];
		$appradd 					= $this->apprvmod;
		$uname 					= $this->session->userdata('username');
		$section 				= $this->session->userdata('section');
		$data['nopp']			= $nop;
		$data['usernm']			= $appradd->getuserpp($uname);
		$data['detpp'] 			= $appradd->getmodulpp($nop);
		$data['problem']		= $appradd->getproblem($section);
		$data['jenis_pp']		= $appradd->getjenispp($section);
		$this->load->view('prog/tambah_modulpp',$data);
	}

	function simpanmodulpp()
	{
		$appradd 				= $this->apprvmod;
		$hasil = $appradd->simpan_modulpp();
		
		
	}
}
?>