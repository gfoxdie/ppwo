<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class userakses extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			//$this->load->helper('number_to_words');
			$this->load->model('usermod');
			$this->load->library('form_validation');
		}
		
		function index()
		{
			
			$useradd 	= $this->usermod;
			$data["judul"]="Manajemen Pengguna";
			$data["usraks"]=$useradd->getusers();
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/userakses',$data);
			$this->load->view('layout/footer');
		}
		
		function vi_entryduser($id)
		{
			$useradd 			= $this->usermod;
			$data["usraks"]		= $useradd->getbyid($id);
			$data["jumrow"]		= $useradd->getrow($id);
			$this->load->view('prog/entryuser',$data);
		}
		
		function createuser()
		{
			$useradd 	= $this->usermod;
			$uservalid	= $this->form_validation;
			$uservalid->set_rules($useradd->rules());
			//if($uservalid->run()){
				$hasil = $useradd->simpanuser();
				$this->session->set_flashdata('success','berhasil disimpan');
			//}
			
		}
		
		function daybookuser()
		{
			$useradd 	= $this->usermod;
			$hasil = $useradd->daybookuser();
			$this->session->set_flashdata('success','berhasil disimpan');
			
			
		}
		
		function updateuser()
		{
			$useradd 	= $this->usermod;
			$hasil = $useradd->edituser();
			$this->session->set_flashdata('success','berhasil disimpan');
			
			
		}
		
		function nonaktifuser($id)
		{
			$useradd = $this->usermod;
			$hasil = $useradd->nonaktifuser($id);
			$this->session->set_flashdata('success','berhasil disimpan');
			$data["judul"]="Manajemen Pengguna";
			$data["usraks"]=$useradd->getusers();
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/userakses',$data);
			$this->load->view('layout/footer');
			
		}
		
		function reaktifuser($id)
		{
			$useradd = $this->usermod;
			$hasil = $useradd->reaktifuser($id);
			$this->session->set_flashdata('success','berhasil disimpan');
			$data["judul"]="Manajemen Pengguna";
			$data["usraks"]=$useradd->getusers();
			$this->load->view('layout/header');
			$this->load->view('layout/navbar',$data);
			$this->load->view('prog/userakses',$data);
			$this->load->view('layout/footer');
			
		}
	}
