<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendataanSiswa_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	public function get_Agama(){
		$query = $this->db->get_where('msagama', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function get_Kategori(){
		$query = $this->db->get_where('mskategorikelas', array('flagactive' => 'Y'));
		return $query->result_array();
	}
	
}
