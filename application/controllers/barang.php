<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('mydesa_model');
	}
	function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('barang/barang');
		$this->load->view('layout/footer');
	}
}
