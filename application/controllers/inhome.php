<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inhome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('number_to_words');
		$this->load->model('usermod');
		$this->load->library('form_validation');
	}
	public function index()
	{	
		
		
		// jika form login disubmit
        if($this->input->post()){
            if($this->usermod->doLogin()) redirect(site_url('admin'));
        }

        // tampilkan halaman login
		//$data['sections'] = $this->session->userdata('section');
        $this->load->view('layout/header2');
		$this->load->view('layout/navbar2');
		$this->load->view('layout/content2');
		$this->load->view('layout/footer2');
	}
}
