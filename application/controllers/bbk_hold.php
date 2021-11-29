<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bbk_hold extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('bbkmod');
		$this->load->library('form_validation');
	}
	
	function index()
	{
		
		$bbkadd 	= $this->bbkmod;
		$data["judul"]="Bukti Bank Hold";
		$data["bbkhold"]=$bbkadd->getbbk_hold();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar',$data);
		$this->load->view('prog/bbk_hold',$data);
		$this->load->view('layout/footer');
	}
	
	function vi_entrycerai($id)
	{
		$bbkadd 			= $this->bbkmod;
		$data["bbkhold"]	= $bbkadd->getbyid($id);
		$data["detbbkhold"]	= $bbkadd->getbyiddetail($id);
		$this->load->view('prog/detailbbk_hold',$data);
	}
	
	function updatebbk()
	{
		$bbkadd 	= $this->bbkmod;
		$hasil = $bbkadd->savecoabbk2();
		$this->session->set_flashdata('success','berhasil disimpan');
			
		
	}
	
	function daybookbbk()
	{
		$bbkadd 	= $this->bbkmod;
		$hasil = $bbkadd->daybookbbk();
		$this->session->set_flashdata('success','berhasil disimpan');
			
		
	}
	
	function batalbbk($id)
	{
		$bbkadd = $this->bbkmod;
		$hasil = $bbkadd->batalbbk($id);
		$this->session->set_flashdata('success','berhasil disimpan');
		$data["judul"]="Bukti Bank Hold";
		$data["bbkhold"]=$bbkadd->getbbk_hold();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar',$data);
		$this->load->view('prog/bbk_hold',$data);
		$this->load->view('layout/footer');
		
	}
}
