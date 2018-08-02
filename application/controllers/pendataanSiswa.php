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
	
	public function siswabaru(){
		$this->Login_model->keamanan();
		$data['agama'] = $this->pendataansiswa_model->get_Agama();
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanSiswaBaru', $data);
		$this->load->view('templates/footer');
	}
	
	public function kelas(){

		$this->Login_model->keamanan();
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
                $data['tahun'] = $this->pendataansiswa_model->get_Tahun();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanKelas', $data);
		$this->load->view('templates/footer');
	}
        
        public function getJsonKelas(){
		$list = $this->pendataansiswa_model->getSiswaBaru();
		$data = array();
		$no = 0;
		foreach($list->result() as $siswa) {
			$no ++;
			$row = array();
			$row[] = $siswa->NomorIndukSiswa;
			$row[] = $siswa->NamaSiswa;
			$row[] = '<input type="checkbox" id="cx-'.$siswa->NomorIndukSiswa.'" name="chbox[]"
               value="'.$siswa->NomorIndukSiswa.'" />';

			$data[] = $row;
		}

		$output = array (
				"data" => $data,
		);
		echo json_encode($output);
        }
        
        public function updateKelas(){
            $id = $this->input->post('id');
            $arr = $this->input->post('array');
            foreach($arr as $ar){
                $this->pendataansiswa_model->updateKelas($id, $ar);
            }
        }
        
        public function getKelas(){
            $thn = $this->input->post('thn');
            $kat = $this->input->post('kat');
            $data = $this->pendataansiswa_model->getKelas($thn, $kat);
            echo '<option class="form-control" value="">-- Pilih Kelas --</option>';
            foreach($data->result() as $row){
                    echo '<option class="form-control" value="'.$row->ID_Kelas.'">'.$row->NamaKelas.'</option>';
            }
        }
}
