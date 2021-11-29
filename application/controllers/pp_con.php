<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pp_con extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('ppmod');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index(){
		
		$ppadd 				= $this->ppmod;
		$uname 				= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$singkatan 			= $this->session->userdata('singkatan');

		$countpp 			= $ppadd->getnopp($section);//? 0 : $ppadd->getnopp($section) ;
		$data['nopp'] 		= substr("000".strval($countpp + 1),-3)."/".$singkatan."/PP/".date('m')."/".date('y');
		$data['pptahun'] 	= $ppadd->getpptahunan($section);

		//$data['nopp']		= $nopp;
		$data['section'] 	= $section;
		$data['usernm'] 	= $uname;
		$data['tujuan'] 	= $ppadd->getsect();

		$this->load->view('layout/header2');
		$this->load->view('layout/navbar2');
		$this->load->view('prog/pp_v',$data);
		$this->load->view('layout/footer2');
    }

	function nopp(){
		$ppadd 				= $this->ppmod;
		$section 			= $this->session->userdata('section');
		$singkatan 			= $this->session->userdata('singkatan');

		$countpp 			= $ppadd->getnopp($section);//? 0 : $ppadd->getnopp($section) ;
		$data['nopp']		= substr("000".strval($countpp + 1),-3)."/".$singkatan."/PP/".date('m')."/".date('y');
	}
	function simpan_pp()
	{
		$ppadd 				= $this->ppmod;
		$ppvalid			= $this->form_validation;
		$ppvalid->set_rules($ppadd->rules());
		if($ppvalid->run()){
			$hasil = $ppadd->simpanpp();
			$this->session->set_flashdata('success','berhasil disimpan');
			redirect('/pp_con', 'refresh');
		
		}
	}

	function take_pp()
	{
		$ppadd 				= $this->ppmod;
		$data['uname']		= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$data['pptake'] 	= $ppadd->getpptake($section);
		$this->load->view('layout/header2');
		$this->load->view('layout/navbar2');
		$this->load->view('prog/takepp_v',$data);
		$this->load->view('layout/footer2');
	}

	function modaltake_pp()
	{
		$post 				= $this->input->post();
		$nop		    	= $post['id'];
		$ppadd 				= $this->ppmod;
		$uname 				= $this->session->userdata('username');
		$data['usernm']		= $ppadd->getuserpp($uname);
		$data['detpp'] 		= $ppadd->getdetailpp($nop);
		$this->load->view('prog/formpp_modal',$data);
	}

	function modaljenis_pp()
	{
		$post 				= $this->input->post();
		$nop		    	= $post['nopp'];
		$ppadd 				= $this->ppmod;
		$uname 				= $this->session->userdata('username');
		$section 			= $this->session->userdata('section');
		$data['usernm']		= $ppadd->getuserpp($uname);
		$data['detpp'] 		= $ppadd->getdetailpp($nop);
		$data['problem']	= $ppadd->getproblem($section);
		$data['jenis_pp']	= $ppadd->getjenispp($section);
		$this->load->view('prog/jenis_pp',$data);
	}

	function update_pp(){
		$ppadd 				= $this->ppmod;
		$hasil 				= $ppadd->updatepp();
		redirect('/pp_con/take_pp', 'refresh');
	}

	function listprocess_pp()
	{
		$ppadd 				= $this->ppmod;
		$data['uname']		= $this->session->userdata('nama');
		$section 			= $this->session->userdata('section');
		$data['ppproc'] 	= $ppadd->getppproc($section);
		//$data['getmod'] 	= $ppadd->getmodulpp($nopp);
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
		$ppadd 					= $this->ppmod;
		$uname 					= $this->session->userdata('username');
		$section 				= $this->session->userdata('section');
		$data['nopp']			= $nop;
		$data['usernm']			= $ppadd->getuserpp($uname);
		$data['detpp'] 			= $ppadd->getmodulpp($nop);
		$data['problem']		= $ppadd->getproblem($section);
		$data['jenis_pp']		= $ppadd->getjenispp($section);
		$this->load->view('prog/tambah_modulpp',$data);
	}

	function simpanmodulpp()
	{
		$ppadd 				= $this->ppmod;
		$hasil = $ppadd->simpan_modulpp();
		
		
	}
}
?>