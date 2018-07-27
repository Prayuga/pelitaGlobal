<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frontend_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	public function get_list(){
		$query = $this->db->get_where('msstationary', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function entryData(){
		$data = array(
			'NamaPengambil' => $this->input->post('nama'),
			'ID_Stationary' => $this->input->post('stationary'),
			'Jumlah' =>	$this->input->post('jumlah'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		$this->db->insert('trstationary', $data);
	}

	public function getStok($id){
		$query = $this->db->get_where('msstationary', array('ID_Stationary' => $id));
		return $query->result_array();
	}

	public function updateStok($id){
		date_default_timezone_set('Asia/Jakarta');
		$datetime = date('Y-m-d H:i:s');
		$data = array(
			'Stok' => $this->input->post('sisaStok'),
			'LastUpdate' => $datetime
		);

		$this->db->where('id_stationary', $id);
		return $this->db->update('msstationary', $data);
	}
}
