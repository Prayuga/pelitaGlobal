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
