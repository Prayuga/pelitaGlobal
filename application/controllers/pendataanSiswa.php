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

    public function baru(){
        $this->Login_model->keamanan();
        $data['agama'] = $this->pendataansiswa_model->get_Agama();
        $data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $this->load->view('templates/header');
        $this->load->view('pendataanSiswa/pendataanSiswaBaru', $data);
        $this->load->view('templates/footer');
    }

    public function get_umur(){
        $tgl = $this->input->post('tgl');
        $kategori = $this->input->post('kategori');
        $data = $this->pendataansiswa_model->get_u($tgl, $kategori);
        $year = date("Y");
        foreach ($data as $row) {
            echo "* Umur per-Oktober ".$year." : ".$row['tahun']." tahun ".$row['bulan']." bulan, ";
            if($row['stat'] == 'N'){
                echo "Umur Kurang";
            }
        }
    }

    public function add_siswa(){
        $this->pendataansiswa_model->add_sw();
        redirect('pendataanSiswa/baru');
    }
}
