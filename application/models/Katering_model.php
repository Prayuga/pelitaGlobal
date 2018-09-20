<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katering_model extends CI_Model {	

	public function add_kat(){
		$data = array(
			'UntukTanggal' => $this->input->post('tanggal'),
			'NomorIndukSiswa' => $this->input->post('siswa'),
			'Keterangan' => $this->input->post('keterangan'),
			'ID_Pengentri' => $this->session->userdata('ID_User')
		);

		return $this->db->insert('trkatering', $data);
	}

	public function get_laporan($tgl){
		if($tgl!=null){
	        $str = "SELECT s.ID_Kategori, s.ID_Kelas, s.NomorIndukSiswa, s.NamaSiswa FROM trkatering as k, mssiswa as s WHERE k.NomorIndukSiswa = s.NomorIndukSiswa AND month(k.UntukTanggal) = month('".$tgl."') and date(k.UntukTanggal) = date('".$tgl."') and year(k.UntukTanggal) = year('".$tgl."')";
	        $query = $this->db->query($str);
	        //return $query->result_array();
	        return $query;
	    }
	}
	
	
}
