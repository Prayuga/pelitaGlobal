<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->model('kasrt_model');
	}

	// public function index()
	// {
	// 	$this->Login_model->keamanan();
	// 	$this->load->view('templates/header');
	// 	$this->load->view('keuangan/entriKwitansi');
	// 	$this->load->view('templates/footer');
	// }

	public function kasHarian(){
		$this->Login_model->keamanan();
		//$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('keuangan/kasHarian'/*, $data*/);
		$this->load->view('templates/footer');
	}

	public function kasBulan(){
		$this->Login_model->keamanan();
		//$data['jeniskas'] = $this->kasrt_model->get_jenis();
		$this->load->view('templates/header');
		$this->load->view('keuangan/kasBulan'/*, $data*/);
		$this->load->view('templates/footer');
	}
        
        
        public function addKasBulan(){
                $res = $this->kasrt_model->add_kasBulan();
                
                if($res==true){
                    $this->session->set_flashdata('alert','alert-success');
                    $this->session->set_flashdata('msg','Sukses menambah seragam');
                }else{
                    $this->session->set_flashdata('alert','alert-danger');
                    $this->session->set_flashdata('msg','Gagal menambah seragam');
                }
                redirect('keuangan/kasBulan');
                
        }

}

/* End of file entriKwitansi.php */
/* Location: ./application/controllers/entriKwitansi.php */