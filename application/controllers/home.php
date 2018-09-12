<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->Login_model->keamanan();
		$this->load->model('home_model');
	}
	
	public function index()
	{
		$this->Login_model->keamanan();
        $data['ultah'] = $this->home_model->get_ultah();
        $data['surat'] = $this->home_model->get_surat();

		$this->load->view('templates/header');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}

	/*
	public function getMenu(){
		$data['menus']=$this->load->Home_model('getmenu');
		$this->load->view('home',$data);
	}*/


}
