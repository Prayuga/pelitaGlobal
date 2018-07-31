<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendataanSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pendataansiswa_model');
	}
	
	public function index()
	{
		$this->Login_model->keamanan();
		$this->load->view('pendataanSiswa/pendataanSiswaBaru');
	}
	
	public function view(){
		$this->Login_model->keamanan();
		$data['agama'] = $this->pendataansiswa_model->get_Agama();
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanSiswaBaru', $data);
		$this->load->view('templates/footer');
	}
	
	public function kelas( $var = 'pendataanKelas'){

		//cek halamannya ada apa engga
		if(!file_exists(APPPATH."views/pendataanSiswa/".$var.'.php')){
			show_404();
		}

		//ini array
		$data['judul'] = $var;

		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/'.$var);
		$this->load->view('templates/footer');
	}
}
