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
        $data['tahun_ajaran'] = $this->pendataansiswa_model->get_tahunAjaran();
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
            echo "* Umur per-Oktober ".$year." : ".$row['tahun']." tahun ".$row['bulan']." bulan".$row['stat'].$kategori;
            if($row['stat'] == 'N'){
                echo ", Umur Kurang";
            }
        }
    }

    public function add_siswa(){
        $tgl = $this->input->post('tgl_l');
        $kategori = $this->input->post('kategori');
        $data = $this->pendataansiswa_model->get_u($tgl, $kategori);
        foreach ($data as $row) {
            $umur = $row['tahun']." tahun ".$row['bulan']." bulan";
            if($row['stat'] == 'Y'){
                $surat = 'N';
            }else{
                $surat = '-';
            }
            
        }

        $data_s = $this->pendataansiswa_model->get_countSiswa();
        foreach ($data_s as $row_s) {
            $count = $row_s['jumlah']+1;
        }

        $this->pendataansiswa_model->add_sw($umur, $count, $surat);
        redirect('pendataanSiswa/baru');
    }
}
