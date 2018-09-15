<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class katering extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->Login_model->keamanan();
		$this->load->model('katering_model');
		$this->load->model('pendataansiswa_model');
	}

	public function entri(){
		$this->Login_model->keamanan();
        $data['kategori'] = $this->pendataansiswa_model->get_Kategori();

		$this->load->view('templates/header');
		$this->load->view('katering/entri', $data);
		$this->load->view('templates/footer');

	}

	public function prints($tanggal = null){
		$this->Login_model->keamanan();
        $data['laporan'] = $this->katering_model->get_laporan($tanggal);

		$this->load->view('templates/header');
		$this->load->view('katering/print', $data);
		$this->load->view('templates/footer');

	}

	public function add_kat(){
		$res = $this->katering_model->add_kat();
        
        if($res==true){
            $this->session->set_flashdata('msg','Berhasil menambahkan data katering!');
        }else{
            $this->session->set_flashdaqta('msg','Gagal!');
        }
        redirect('katering/entri');
	}

	public function get_Laporan($tgl){
        $list = $this->katering_model->get_laporan($tgl);
        $data = array();
        $no = 1;
        foreach($list->result() as $kat){
            $row = array();
            $row[] = $no;
            $row[] = $kat->ID_Kategori." (".$kat->ID_Kelas.")";
            $row[] = $kat->NomorIndukSiswa." - ".$kat->NamaSiswa;
            $no++;

            $data[] = $row;
        }
        $output = array (
            "data" => $data,
        );
        echo json_encode($output);
    }
}
