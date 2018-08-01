<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	// public function get_s(){
	// 	$query = $this->db->get_where('msstationary', array('flagactive' => 'Y'));
	// 	return $query->result_array();
	// }

	// public function add_s(){
	// 	$data = array(
	// 		'NamaStationary' => $this->input->post('nama'),
	// 		'Stok' => $this->input->post('stok'),
	// 		'Satuan' =>	$this->input->post('satuan')
	// 	);

	// 	return $this->db->insert('msstationary', $data);
	// }

	// public function update_s($id_stationary){
	// 	$data = array(
	// 		'NamaStationary' => $this->input->post('nama'),
	// 		'Stok' => $this->input->post('stok'),
	// 		'Satuan' =>	$this->input->post('satuan')
	// 	);

	// 	$this->db->where('id_stationary', $id_stationary);
	// 	return $this->db->update('msstationary', $data);
	// }

	// public function delete_s($id_stationary){
	// 	$data = array(
	// 		'flagactive' => 'N'
	// 	);

	// 	$this->db->where('id_stationary', $id_stationary);
	// 	return $this->db->update('msstationary', $data);
	// }
}
