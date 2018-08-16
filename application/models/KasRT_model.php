<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasRT_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	public function get_jenis(){
		$query = $this->db->get_where('msjenispengeluaran', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function add_jenis(){
		$data = array(
			'JenisPengeluaran' => $this->input->post('jenis'),
			'Keterangan' => $this->input->post('keterangan')
		);

		return $this->db->insert('msjenispengeluaran', $data);
	}

	public function update_jenis($id_jenis){
		$data = array(
			'JenisPengeluaran' => $this->input->post('jenis'),
			'Keterangan' => $this->input->post('keterangan')
		);

		$this->db->where('ID_JenisPengeluaran', $id_jenis);
		return $this->db->update('msjenispengeluaran', $data);
	}

	public function delete_jenis($id_jenis){
		$data = array(
			'flagactive' => 'N'
		);

		$this->db->where('ID_JenisPengeluaran', $id_jenis);
		return $this->db->update('msjenispengeluaran', $data);
	}
        

	public function add_kasBulan(){
		$data = array(
			'Bulan' => $this->input->post('bln'),
			'Tahun' => $this->input->post('thn'),
                        'StartDate' => $this->input->post('start'),
                        'EndDate' => $this->input->post('end'),
                        'Keterangan' => $this->input->post('ket')
		);

		return $this->db->insert('trheaderpengeluaran', $data);
	}
}
