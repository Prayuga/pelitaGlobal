<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		$this->load->view('login_view');
	}

	public function ceklogin(){
		$username = $this->input->post('userId');
		$password = $this->input->post('password');
		$this->load->model('Login_model');
		$this->Login_model->ambillogin($username, $password);
	}

	public function logout(){
		$this->session->set_userdata('username', FALSE);
		$this->session->sess_destroy();
		redirect('');//--?--
	}
}
