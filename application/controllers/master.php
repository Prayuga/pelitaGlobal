<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('stationary_model');
		$this->load->model('seragam_model');
		$this->load->model('tahunajaran_model');
		$this->load->model('kasrt_model');
		$this->load->model('jenispembayaran_model');
		$this->Login_model->keamanan();
	}
	
	// public function stationary(){
	// 	$this->Login_model->keamanan();
	// 	$this->load->view('templates/header');
	// 	$this->load->view('master/stationary');
	// 	$this->load->view('templates/footer');
	// }

	//fungsi atk
	public function stationary(){
		$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('master/stationary', $data);
		$this->load->view('templates/footer');
	}

	public function kasRT(){
		$data['jeniskas'] = $this->kasrt_model->get_jenis();
		$this->load->view('templates/header');
		$this->load->view('master/kasRT', $data);
		$this->load->view('templates/footer');
	}

	public function jenisPembayaran(){
		$data['jenis'] = $this->jenispembayaran_model->get_jenisPembayaran();
		$data['detail'] = $this->jenispembayaran_model->get_detailPembayaran();
		$this->load->view('templates/header');
		$this->load->view('master/jenisPembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function add_jenisPembayaran(){
		$res = $this->jenispembayaran_model->add_jenis();

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan jenis pembayaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan jenis pembayaran!');
        }
		redirect('master/jenisPembayaran');
	}

	public function add_jenisKas(){
		$res = $this->kasrt_model->add_jenis();

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan jenis pengeluaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan jenis pengeluaran!');
        }
		
		redirect('master/kasRT');
	}

	public function add_stationary(){
		$res = $this->stationary_model->add_s();

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan ATK!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan ATK!');
        }
		
		redirect('master/stationary');
	}

	public function update_jenisPembayaran($id_detail){
		$res = $this->jenispembayaran_model->update_jenisPembayaran($id_detail);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah jenis pembayaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah jenis pembayaran!');
        }
		
		redirect('master/jenisPembayaran');
	}

	public function update_stationary($id_stationary){
		$res = $this->stationary_model->update_s($id_stationary);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah ATK!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah ATK!');
        }
		
		redirect('master/stationary');
	}

	public function update_jenisKas($id_jenis){
		$res = $this->kasrt_model->update_jenis($id_jenis);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah jenis pengeluaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah jenis pengeluaran!');
        }
		
		redirect('master/kasRT');
	}

	public function delete_jenisPembayaran($id_detail){
		$res = $this->jenispembayaran_model->delete_jenisPembayaran($id_detail);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus jenis pembayaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus jenis pembayaran!');
        }
		
		redirect('master/jenisPembayaran');
	}

	public function delete_stationary($id_stationary){
		$res = $this->stationary_model->delete_s($id_stationary);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus ATK!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus ATK!');
        }
		
		redirect('master/stationary');
	}

	public function delete_jenisKas($id_jenis){
		$res = $this->kasrt_model->delete_jenis($id_jenis);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus jenis pengeluaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus jenis pengeluaran!');
        }
		
		redirect('master/kasRT');
	}

	public function kelas(){
		//$data['stationary'] = $this->stationary_model->get_s();
		$this->load->view('templates/header');
		$this->load->view('master/kelas'/*, $data*/);
		$this->load->view('templates/footer');
	}

	public function tahunAjaran(){
		$data['tahunAjaran'] = $this->tahunajaran_model->get_TA();
		$data['kategorikelas'] = $this->tahunajaran_model->get_KK();
		$data['kelas'] = $this->tahunajaran_model->get_KELAS();
		$this->load->view('templates/header');
		$this->load->view('master/tahunAjaran', $data);
		$this->load->view('templates/footer');
	}

	public function add_tahunAjaran(){
		$res = $this->tahunajaran_model->add_TA();

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan tahun ajaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan tahun ajaran!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function add_kategorikelas(){
		$res = $this->tahunajaran_model->add_KK();

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan kategori kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan kategori kelas!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function add_kelas(){
		$res = $this->tahunajaran_model->add_KLS();

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan kelas!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function update_tahunAjaran($id_tahunAjaran){
		$res = $this->tahunajaran_model->update_TA($id_tahunAjaran);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah tahun ajaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah tahun ajaran!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function delete_tahunAjaran($id_tahunAjaran){
		$res = $this->tahunajaran_model->delete_TA($id_tahunAjaran);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus tahun ajaran!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus tahun ajaran!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function delete_kategorikelas($id_kategorikelas){
		$res = $this->tahunajaran_model->delete_KK($id_kategorikelas);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus kategori kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus kategori kelas!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function update_kelas($id_kelas){
		$res = $this->tahunajaran_model->update_KLS($id_kelas);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah kelas!');
        }
		
		redirect('master/tahunAjaran');
	}

	public function delete_kelas($id_kelas){
		$res = $this->tahunajaran_model->delete_KLS($id_kelas);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus kelas!');
        }
		
		redirect('master/tahunAjaran');
	}


	public function update_kategorikelas($id_kategorikelas){
		$res = $this->tahunajaran_model->update_KK($id_kategorikelas);

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah kategori kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah kategori kelas!');
        }
		
		redirect('master/tahunAjaran');
	}

	//end fungsi atk

	// fungsi seragam
	public function seragam(){
		$this->load->view('templates/header');
		$this->load->view('master/seragam');
		$this->load->view('templates/footer');
	}

	public function addseragam(){
		$jenis = $this->input->post('jk');
		if ($jenis=='1') {
			$jenis='L';
		}else if ($jenis=='2') {
			$jenis='P';
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
		$this->session->set_flashdata('alert','success');
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
		$this->session->set_flashdata('alert','success');
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
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Update" onclick="Update_sera('."'".$sera->ID_detailseragam."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah Stok</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="Delete_sera('."'".$sera->ID_detailseragam."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';

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
		$this->session->set_flashdata('alert','success');
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
