<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {


	public function __construct(){
		parent::__construct();
	}
	
	public function siswaglobal(){
		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('laporan/laporanSiswaGlobal');
		$this->load->view('templates/footer');
	}
	
	public function siswakelas(){
		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('laporan/laporanSiswaKelas');
		$this->load->view('templates/footer');
	}
}
