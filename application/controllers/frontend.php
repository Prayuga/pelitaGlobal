<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frontend extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('frontend_model');
                $this->Login_model->keamanan();
	}

	public function stationary(){
		$data['stationary'] = $this->frontend_model->get_list();
		$this->load->view('indexStationary', $data);
	}

	public function stok($id){
		$data = $this->frontend_model->getStok($id);
		foreach ($data as $row) {
			echo $row['Stok'];
		}
	}

	public function entry(){
		$id = $this->input->post('stationary');
		$this->frontend_model->entryData();
		$this->frontend_model->updateStok($id);
		redirect('frontend/stationary');
	}


}
