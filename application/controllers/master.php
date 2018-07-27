<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('stationary_model');
		$this->load->model('seragam_model');
	}
	
	// public function stationary(){
	// 	$this->Login_model->keamanan();
	// 	$this->load->view('templates/header');
	// 	$this->load->view('master/stationary');
	// 	$this->load->view('templates/footer');
	// }

	//fungsi atk
	public function stationary(){
		$this->Login_model->keamanan();
		$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('master/stationary', $data);
		$this->load->view('templates/footer');
	}

	public function add_stationary(){
		$this->stationary_model->add_s();
		redirect('master/stationary');
	}

	public function update_stationary($id_stationary){
		$this->stationary_model->update_s($id_stationary);
		redirect('master/stationary');
	}

	public function delete_stationary($id_stationary){
		$this->stationary_model->delete_s($id_stationary);
		redirect('master/stationary');
	}

	public function tahunAjaran(){
		$this->Login_model->keamanan();
		//$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('master/tahunAjaran'/*, $data*/);
		$this->load->view('templates/footer');
	}

	public function kategori(){
		$this->Login_model->keamanan();
		//$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('master/kategori'/*, $data*/);
		$this->load->view('templates/footer');
	}

	public function kelas(){
		$this->Login_model->keamanan();
		//$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('master/kelas'/*, $data*/);
		$this->load->view('templates/footer');
	}
	//end fungsi atk

	// fungsi seragam
	public function seragam(){

		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('master/seragam');
		$this->load->view('templates/footer');
	}

	public function addseragam(){
		$this->Login_model->keamanan();
		$jenis = $this->input->post('jk');
		if ($jenis=='1') {
			$jenis='Laki-laki';
		}else if ($jenis=='2') {
			$jenis='Perempuan';
		}else if ($jenis=='3') {
			$jenis='Campur';
		}else{
			echo 'Input jenis kelamin salah!';
			exit();
		}
		$data = array(
			'Nama_seragam' => $this->input->post('nama_s'),
			'JK' => $jenis,
		);
		$insert = $this->seragam_model->add($data);
		$this->session->set_flashdata('alert','alert-success');
		$this->session->set_flashdata('msg','Sukses menambah seragam');
		$this->load->view('templates/header');
		$this->load->view('master/seragam');
		$this->load->view('templates/footer');
	}


	public function addukuran(){
		$id = $this->input->post('nama_ser');
		$stok = $this->input->post('Stok');
		$ukuran = array();
		$ukuran = $this->input->post('cb');
		$this->seragam_model->addUkuran($id,$ukuran,$stok);
		$this->session->set_flashdata('alert','alert-success');
		$this->session->set_flashdata('msg','Sukses menambah ukuran');
		$this->load->view('templates/header');
		$this->load->view('master/seragam');
		$this->load->view('templates/footer');
	}

	public function getSeragam(){
		$data = $this->seragam_model->getSeragam();
		foreach($data->result() as $row) {
			# code...
			echo '<option value="'.$row->Id_seragam.'">'.$row->Nama_seragam.'</option>';
			
		}
	}

	public function getJsonSeragam(){
		$list = $this->seragam_model->getDetailSeragam();
		$data = array();
		$no = 0;
		foreach($list->result() as $sera) {
			$no ++;
			$row = array();
			$row[] = $sera->Nama_seragam;
			$row[] = $sera->JK;
			$row[] = $sera->ukuran;
			$row[] = $sera->stok;
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Update" onclick="Update_sera('."'".$sera->ID_detailseragam."'".')"><i class="glyphicon glyphicon-pencil"></i> Update Stok</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="Delete_sera('."'".$sera->ID_detailseragam."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array (
				"data" => $data,
		);
		echo json_encode($output);
	}

	public function getStok($id){
		$stok = $this->seragam_model->getStok($id);
		echo json_encode($stok);
	}

	public function updateStok(){
		$id = $this->input->post('id');
		$stok = $this->input->post('Stok');
		$this->seragam_model->updateStok($id, $stok);
		$this->session->set_flashdata('alert','alert-success');
		$this->session->set_flashdata('msg','Sukses update stok');
		$this->load->view('templates/header');
		$this->load->view('master/seragam');
		$this->load->view('templates/footer');
	}

	public function delSeragam($id){
		$this->seragam_model->delSeragam($id);
		echo json_encode(array("status" => TRUE));
	}
	// end fungsi seragam
}
