<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaran_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	public function get_TA(){
		$query = $this->db->get_where('mstahunajaran', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function get_KK(){
		$query = $this->db->get_where('mskategorikelas', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function get_KELAS(){
        $sql = "SELECT k.ID_Kelas, k.ID_TahunAjaran,  t.TahunAjaran, k.ID_Kategori, kk.NamaKategori, k.NamaKelas, k.Keterangan FROM msheaderkelas k, mstahunajaran t, mskategorikelas kk WHERE k.ID_Kategori = kk.ID_Kategori AND t.ID_TahunAjaran = k.ID_TahunAjaran AND k.FlagActive = 'Y'";
        $query = $this->db->query($sql);
        return $query->result_array();
	}

	public function add_TA(){
		$data = array(
			'TahunAjaran' => $this->input->post('tahunAjaran'),
			'Start' => $this->input->post('start'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		return $this->db->insert('mstahunajaran', $data);
	}

	public function add_KK(){
		$data = array(
			'SingkatanKategori' => $this->input->post('singkatanKategori'),
			'NamaKategori' => $this->input->post('namaKategori'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		return $this->db->insert('mskategorikelas', $data);
	}

	public function add_KLS(){
		$data = array(
			'ID_Kategori' => $this->input->post('kategori'),
			'ID_TahunAjaran' => $this->input->post('tahun_ajaran'),
			'NamaKelas' =>	$this->input->post('namakelas'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		return $this->db->insert('msheaderkelas', $data);
	}

	public function update_TA($id_tahunAjaran){
		$data = array(
			'TahunAjaran' => $this->input->post('tahunAjaran'),
			'Start' => $this->input->post('start'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		$this->db->where('ID_TahunAjaran', $id_tahunAjaran);
		return $this->db->update('mstahunajaran', $data);
	}
	public function delete_KK($id_kategorikelas){
		$data = array(
			'flagactive' => 'N'
		);

		$this->db->where('ID_Kategori', $id_kategorikelas);
		return $this->db->update('mskategorikelas', $data);
	}

	public function update_KLS($id_kelas){
		$data = array(
			'ID_Kategori' => $this->input->post('kategori'),
			'ID_TahunAjaran' => $this->input->post('tahun_ajaran'),
			'NamaKelas' =>	$this->input->post('namakelas'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		$this->db->where('ID_Kelas', $id_kelas);
		return $this->db->update('msheaderkelas', $data);
	}

	public function delete_TA($id_tahunAjaran){
		$data = array(
			'flagactive' => 'N'
		);

		$this->db->where('ID_TahunAjaran', $id_tahunAjaran);
		return $this->db->update('mstahunajaran', $data);
	}

	public function delete_KLS($id_kelas){
		$data = array(
			'flagactive' => 'N'
		);

		$this->db->where('ID_Kelas', $id_kelas);
		return $this->db->update('msheaderkelas', $data);
	}

	public function update_KK($id_kategorikelas){
		$data = array(
			'SingkatanKategori' => $this->input->post('singkatanKategori'),
			'NamaKategori' => $this->input->post('namaKategori'),
			'MinUmur' => $this->input->post('minUmur'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		$this->db->where('ID_Kategori', $id_kategorikelas);
		return $this->db->update('mskategorikelas', $data);
	}

	public function get_Kls(){
		$query = $this->db->get_where('msheaderkelas', array('flagactive' => 'Y'));
		return $query->result_array();
	}
}
