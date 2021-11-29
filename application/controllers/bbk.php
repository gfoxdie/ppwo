<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bbk extends CI_Controller {
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
		$hasil = 0;
		$data['oid'] = $hasil;
		$bbkadd 	= $this->bbkmod;
		$data["judul"]="Bukti Bank Keluar";
		$data["bbk"]=$bbkadd->getbyid($hasil);
		$data["bbkdet"]=$bbkadd->getbyiddetail($hasil);
		$data["bbkjum"]	= $bbkadd->getsumdetail($hasil);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar', $data);
		$this->load->view('prog/bbk',$data);
		$this->load->view('layout/footer');
	}
	
	function simpanbbk()
	{
		$bbkadd 	= $this->bbkmod;
		$bbkvalid	= $this->form_validation;
		$bbkvalid->set_rules($bbkadd->rules());
		if($bbkvalid->run()){
			$hasil = $bbkadd->simpanbbk();
			$this->session->set_flashdata('success','berhasil disimpan');
			$data["judul"]="Bukti Kas Keluar";
			$data['oid'] = $hasil;
			$data["bbk"]=$bbkadd->getbyid($hasil);
			$data["bbkdet"]=$bbkadd->getbyiddetail($hasil);
			$data["bbkjum"]	= $bbkadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar', $data);
			$this->load->view('prog/bbk', $data);
			$this->load->view('layout/footer');
		}
	}
	
	function simpanbbk_det()
	{
		$bbkdetadd 		= $this->bbkmod;
		$bbkdetvalid	= $this->form_validation;
		$bbkdetvalid->set_rules($bbkdetadd->rulesdetail());
		if($bbkdetvalid->run()){
			$hasil = $bbkdetadd->simpanbbkdetail();
			$this->session->set_flashdata('success','berhasil disimpan');
			$data["judul"]="Bukti Bank Keluar";
			$data['oid'] 	= $hasil;
			$data["bbk"]	= $bbkdetadd->getbyid($hasil);
			$data["bbkdet"]	= $bbkdetadd->getbyiddetail($hasil);
			$data["bbkjum"]	= $bbkdetadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/bbk', $data);
			$this->load->view('layout/footer');
		}
	}
	
	function editbbk_det()
	{
		$bbkdetadd 		= $this->bbkmod;
		$bbkdetvalid	= $this->form_validation;
		$bbkdetvalid->set_rules($bbkdetadd->rulesdetailedt());
		if($bbkdetvalid->run()){
			$hasil = $bbkdetadd->editbbkdetail();
			$this->session->set_flashdata('success','berhasil disimpan');
			$data["judul"]="Bukti Bank Keluar";
			$data['oid'] 	= $hasil;
			$data["bbk"]	= $bbkdetadd->getbyid($hasil);
			$data["bbkdet"]	= $bbkdetadd->getbyiddetail($hasil);
			$data["bbkjum"]	= $bbkdetadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/bbk', $data);
			$this->load->view('layout/footer');
		}
	}
	
	function deletbbk_det($id=null)
	{
		$bbkdetadd 		= $this->bbkmod;
		$hasil 			= $bbkdetadd->getparentiddet($id);
		
		foreach($hasil as $row){
			$oid = $row->parentobjectid;
		}
		
		$data['oid'] 	= $oid;
		$data["bbk"]	= $bbkdetadd->getbyid($oid);
		
		$data["judul"]="Bukti Bank Keluar";
		
		$this->bbkmod->deletbbkdetail($id);
		
		$data["bbkdet"]	= $bbkdetadd->getbyiddetail($oid);
		$data["bbkjum"]	= $bbkdetadd->getsumdetail($oid);
		
		$this->load->view('layout/header');
		$this->load->view('layout/navbar',$data);
		$this->load->view('prog/bbk', $data);
		$this->load->view('layout/footer');
	}
}
