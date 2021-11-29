<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bkk extends CI_Controller {
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
		$hasil = 0;
		$data['oid'] = $hasil;
		$bkkadd 	= $this->bkkmod;
		$data["judul"]="Bukti Kas Keluar";
		$data["bkk"]=$bkkadd->getbyid($hasil);
		$data["bkkdet"]=$bkkadd->getbyiddetail($hasil);
		$data["bkkjum"]	= $bkkadd->getsumdetail($hasil);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar', $data);
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
			$data["judul"]="Bukti Kas Keluar";
			$data['oid'] = $hasil;
			$data["bkk"]=$bkkadd->getbyid($hasil);
			$data["bkkdet"]=$bkkadd->getbyiddetail($hasil);
			$data["bkkjum"]	= $bkkadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar', $data);
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
			$data["judul"]="Bukti Kas Keluar";
			$data['oid'] 	= $hasil;
			$data["bkk"]	= $bkkdetadd->getbyid($hasil);
			$data["bkkdet"]	= $bkkdetadd->getbyiddetail($hasil);
			$data["bkkjum"]	= $bkkdetadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/bkk', $data);
			$this->load->view('layout/footer');
		}
	}
	
	function editbkk_det()
	{
		$bkkdetadd 		= $this->bkkmod;
		$bkkdetvalid	= $this->form_validation;
		$bkkdetvalid->set_rules($bkkdetadd->rulesdetailedt());
		if($bkkdetvalid->run()){
			$hasil = $bkkdetadd->editbkkdetail();
			$this->session->set_flashdata('success','berhasil disimpan');
			$data["judul"]="Bukti Kas Keluar";
			$data['oid'] 	= $hasil;
			$data["bkk"]	= $bkkdetadd->getbyid($hasil);
			$data["bkkdet"]	= $bkkdetadd->getbyiddetail($hasil);
			$data["bkkjum"]	= $bkkdetadd->getsumdetail($hasil);
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/bkk', $data);
			$this->load->view('layout/footer');
		}
	}
	
	function deletbkk_det($id=null)
	{
		$bkkdetadd 		= $this->bkkmod;
		$hasil 			= $bkkdetadd->getparentiddet($id);
		
		foreach($hasil as $row){
			$oid = $row->parentobjectid;
		}
		
		$data['oid'] 	= $oid;
		$data["bkk"]	= $bkkdetadd->getbyid($oid);
		
		$data["judul"]="Bukti Kas Keluar";
		
		$this->bkkmod->deletbkkdetail($id);
		
		$data["bkkdet"]	= $bkkdetadd->getbyiddetail($oid);
		$data["bkkjum"]	= $bkkdetadd->getsumdetail($oid);
		
		$this->load->view('layout/header');
		$this->load->view('layout/navbar',$data);
		$this->load->view('prog/bkk', $data);
		$this->load->view('layout/footer');
	}
}
