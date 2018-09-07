<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPembayaran_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	public function get_jenisPembayaran(){
		$query = $this->db->get_where('msheaderjenispembayaran', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function add_jenis(){
		$data = array(
			'ID_HeaderJenisPembayaran' => $this->input->post('jenis'),
			'DetailPembayaran' => $this->input->post('nama'),
			'Harga' =>	$this->input->post('harga'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		return $this->db->insert('msdetailjenispembayaran', $data);
	}

	public function get_detailPembayaran(){
		$str = "SELECT b.ID_DetailJenisPembayaran, b.ID_HeaderJenisPembayaran, b.Harga as harga_def, a.JenisPembayaran, b.DetailPembayaran, b.Keterangan, CONCAT('Rp', FORMAT(b.Harga, 2)) as harga, DATE_FORMAT(b.LastUpdate, '%e %M %Y %T') as tanggal FROM msheaderjenispembayaran as a, msdetailjenispembayaran as b WHERE a.ID_HeaderJenisPembayaran = b.ID_HeaderJenisPembayaran and b.FlagActive='Y' ";
		$query = $this->db->query($str);
		return $query->result_array();
	}	

	public function update_jenisPembayaran($id_detail){
		$data = array(
			'ID_HeaderJenisPembayaran' => $this->input->post('jenis'),
			'DetailPembayaran' => $this->input->post('nama'),
			'Harga' =>	$this->input->post('harga'),
			'Keterangan' =>	$this->input->post('keterangan')
		);

		$this->db->where('ID_DetailJenisPembayaran', $id_detail);
		return $this->db->update('msdetailjenispembayaran', $data);
	}

	public function delete_jenisPembayaran($id_detail){
		$data = array(
			'flagactive' => 'N'
		);

		$this->db->where('ID_DetailJenisPembayaran', $id_detail);
		return $this->db->update('msdetailjenispembayaran', $data);
	}
}
