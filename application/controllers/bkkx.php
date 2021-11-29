<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bkk extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('number_to_words');
		$this->load->model('bkkmod');
		$this->load->library('form_validation');
	}
	
	function index()
	{
		$hasil = 0;
		$data['oid'] = $hasil;
		$bkkadd 	= $this->bkkmod;
		$data["bkk"]=$bkkadd->getbyid($hasil);
		$data["bkkdet"]=$bkkadd->getbyiddetail($hasil);
		$data["bkkjum"]	= $bkkadd->getsumdetail($hasil);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('prog/bkk',$data);
		$this->load->view('layout/footer');
	}
	
	function simpanbkk()
	{
		$bkkadd 	= $this->bkkmod;
		$bkkvalid	= $this->form_validation;
		$bkkvalid->set_rules($bkkadd->rules());
		if($bkkvalid->run()){
			$hasil = $bkkadd->simpanbkk();
			$this->session->set_flashdata('success','berhasil disimpan');
			$data['oid'] = $hasil;
			$data["bkk"]=$bkkadd->getbyid($hasil);
			$data["bkkdet"]=$bkkadd->getbyiddetail($hasil);
			$data["bkkjum"]	= $bkkadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');
			$this->load->view('prog/bkk', $data);
			$this->load->view('layout/footer');
		}
	}
	
	function simpanbkk_det()
	{
		$bkkdetadd 		= $this->bkkmod;
		$bkkdetvalid	= $this->form_validation;
		$bkkdetvalid->set_rules($bkkdetadd->rulesdetail());
		if($bkkdetvalid->run()){
			$hasil = $bkkdetadd->simpanbkkdetail();
			$this->session->set_flashdata('success','berhasil disimpan');
			$data['oid'] 	= $hasil;
			$data["bkk"]	= $bkkdetadd->getbyid($hasil);
			$data["bkkdet"]	= $bkkdetadd->getbyiddetail($hasil);
			$data["bkkjum"]	= $bkkdetadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');
			$this->load->view('prog/bkk', $data);
			$this->load->view('layout/footer');
		}
	}
}
