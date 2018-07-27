<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	
	public function index()
	{
		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	/*
	public function getMenu(){
		$data['menus']=$this->load->Home_model('getmenu');
		$this->load->view('home',$data);
	}*/


}
