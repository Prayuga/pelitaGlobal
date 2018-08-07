<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('tahunajaran_model');
		$this->load->model('Laporan_model');
	}
	
	public function siswa_all(){
		$this->Login_model->keamanan();
		$data['tahun_ajaran'] = $this->tahunajaran_model->get_TA();
		$data['kategori'] = $this->tahunajaran_model->get_KK();
                $data['kelas'] = $this->tahunajaran_model->get_Kls();
		$this->load->view('templates/header');
		$this->load->view('laporan/laporanSiswaAll', $data);
		$this->load->view('templates/footer');
	}
        
        public function getJsonSiswa(){
            $list = $this->Laporan_model->getSiswa();
            $data = array();
            $no = 0;
            foreach($list->result() as $siswa){
                $no++;
                $row = array();
                $row[] = $siswa->NomorIndukSiswa;
                $row[] = $siswa->NamaSiswa;
                $row[] = $siswa->JenisKelamin;
                $row[] = $siswa->TempatLahir;
                $row[] = $siswa->TanggalLahir;
                $row[] = $siswa->UmurSaatMendaftar;
                $row[] = $siswa->NamaKelas;
                $row[] = $siswa->Agama;
                $row[] = $siswa->NamaAyah;
                $row[] = $siswa->NamaIbu;
                $row[] = $siswa->Alamat;
                $row[] = $siswa->NoTelp;
                
                $data[] = $row;
            }
            $output = array (
                "data" => $data,
            );
            echo json_encode($output);
        }
        
        public function getSiswaByTahun($thna,$thnb){
            //$kat = $this->input->post('kat');
            $thn = $thna."/".$thnb;
            $list = $this->Laporan_model->getSiswaByTahun($thn);
            $data = array();
            $no = 0;
            foreach($list->result() as $siswa){
                $no++;
                $row = array();
                $row[] = $siswa->NomorIndukSiswa;
                $row[] = $siswa->NamaSiswa;
                $row[] = $siswa->JenisKelamin;
                $row[] = $siswa->TempatLahir;
                $row[] = $siswa->TanggalLahir;
                $row[] = $siswa->UmurSaatMendaftar;
                $row[] = $siswa->NamaKelas;
                $row[] = $siswa->Agama;
                $row[] = $siswa->NamaAyah;
                $row[] = $siswa->NamaIbu;
                $row[] = $siswa->Alamat;
                $row[] = $siswa->NoTelp;
                
                $data[] = $row;
            }
            $output = array (
                "data" => $data,
            );
            echo json_encode($output);
        }
        
        public function getSiswaByKat($kat){
            $list = $this->Laporan_model->getSiswaByKat($kat);
            $data = array();
            $no = 0;
            foreach($list->result() as $siswa){
                $no++;
                $row = array();
                $row[] = $siswa->NomorIndukSiswa;
                $row[] = $siswa->NamaSiswa;
                $row[] = $siswa->JenisKelamin;
                $row[] = $siswa->TempatLahir;
                $row[] = $siswa->TanggalLahir;
                $row[] = $siswa->UmurSaatMendaftar;
                $row[] = $siswa->NamaKelas;
                $row[] = $siswa->Agama;
                $row[] = $siswa->NamaAyah;
                $row[] = $siswa->NamaIbu;
                $row[] = $siswa->Alamat;
                $row[] = $siswa->NoTelp;
                
                $data[] = $row;
            }
            $output = array (
                "data" => $data,
            );
            echo json_encode($output);
        }
        
        public function getSiswaByKls($kls){
            $list = $this->Laporan_model->getSiswaByKls($kls);
            $data = array();
            $no = 0;
            foreach($list->result() as $siswa){
                $no++;
                $row = array();
                $row[] = $siswa->NomorIndukSiswa;
                $row[] = $siswa->NamaSiswa;
                $row[] = $siswa->JenisKelamin;
                $row[] = $siswa->TempatLahir;
                $row[] = $siswa->TanggalLahir;
                $row[] = $siswa->UmurSaatMendaftar;
                $row[] = $siswa->NamaKelas;
                $row[] = $siswa->Agama;
                $row[] = $siswa->NamaAyah;
                $row[] = $siswa->NamaIbu;
                $row[] = $siswa->Alamat;
                $row[] = $siswa->NoTelp;
                
                $data[] = $row;
            }
            $output = array (
                "data" => $data,
            );
            echo json_encode($output);
        }
}
