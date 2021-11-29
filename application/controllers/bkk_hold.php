<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bkk_hold extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('bkkmod');
		$this->load->library('form_validation');
	}
	
	function index()
	{
		
		$bkkadd 	= $this->bkkmod;
		$data["judul"]="Bukti Kas Hold";
		$data["bkkhold"]=$bkkadd->getbkk_hold();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar',$data);
		$this->load->view('prog/bkk_hold',$data);
		$this->load->view('layout/footer');
	}
	
	function vi_entrydetbkk($id)
	{
		$bkkadd 			= $this->bkkmod;
		$data["bkkhold"]	= $bkkadd->getbyid($id);
		$data["detbkkhold"]	= $bkkadd->getbyiddetail($id);
		$this->load->view('prog/detailbkk_hold',$data);
	}
	function daybookbkk()
	{
		$bkkadd 	= $this->bkkmod;
		$hasil = $bkkadd->daybookbkk();
		$this->session->set_flashdata('success','berhasil disimpan');
			
		
	}
	
	function updatebkk()
	{
		$bkkadd 	= $this->bkkmod;
		$hasil = $bkkadd->savecoabkk2();
		$this->session->set_flashdata('success','berhasil disimpan');
			
		
	}
	function batalbkk($id)
	{
		$bkkadd = $this->bkkmod;
		$hasil = $bkkadd->batalbkk($id);
		$this->session->set_flashdata('success','berhasil disimpan');
		$data["judul"]="Bukti Kas Hold";
		$data["bkkhold"]=$bkkadd->getbkk_hold();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar',$data);
		$this->load->view('prog/bkk_hold',$data);
		$this->load->view('layout/footer');
		
	}
}
