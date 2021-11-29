<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pintumasuk extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('Usermod');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index()
	{
        
        $this->load->view("prog/userin");
	}
	
	function login()
	{
		if($this->input->post()){
            $cek =$this->Usermod->doLogin();
			if($cek){
				$userx = $this->Usermod->cariusers($this->input->post('txtusername'));
				foreach ($userx as $usr){
					$data_session 	= array(
						'username'	=> $usr->username,
						'section' 	=> $usr->section,
						'level' 	=> $usr->level_user,
						'nama' 		=> $usr->nama,
						'singkatan'	=> $usr->singkatan,
						'dev'		=> $usr->dev,
						'pls'		=> $usr->pls,
					);	
				}
				$this->session->set_userdata($data_session);
					
				redirect(site_url('inhome'));
			}
        }

        
        $this->load->view("prog/userin");
	}
	
	public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('pintumasuk'));
    }

}