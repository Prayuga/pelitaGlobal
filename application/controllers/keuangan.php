<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('keuangan/entriKwitansi');
		$this->load->view('templates/footer');
	}

}

/* End of file entriKwitansi.php */
/* Location: ./application/controllers/entriKwitansi.php */