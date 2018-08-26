<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasRT_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	public function get_kasJenis($bln, $jenis){
		$str = "SELECT Keterangan, CONCAT('Rp', FORMAT(Kredit, 2)) as Kredit, DATE_FORMAT(Tanggal, '%e %M %Y %T') as tanggal, CONCAT('Rp', FORMAT(sum(Kredit), 2)) as jumlah FROM trdetailpengeluaran WHERE ID_HeaderPengeluaran = '".$bln."' AND ID_JenisPengeluaran = '".$jenis."' GROUP BY ID_DetailPengeluaran";
		$query = $this->db->query($str);
		return $query;
	}

	public function get_kasTanggal($dari, $sampai){
		$str = "SELECT b.Bulan, b.Tahun, DATE_FORMAT(a.Tanggal, '%e %M %Y %T') as tanggal, c.JenisPengeluaran, a.Keterangan, CONCAT('Rp', FORMAT(a.Debit, 2)) as Debit, CONCAT('Rp', FORMAT(a.Kredit, 2)) as Kredit, CONCAT('Rp', FORMAT(a.Saldo, 2)) as Saldo FROM trdetailpengeluaran as a, trheaderpengeluaran as b, msjenispengeluaran as c WHERE a.ID_HeaderPengeluaran = b.ID_HeaderPengeluaran and a.ID_JenisPengeluaran = c.ID_JenisPengeluaran and a.Tanggal BETWEEN '".$dari." 00:00:00' and '".$sampai." 23:59:00' ";
		$query = $this->db->query($str);
		return $query;
	}	

	public function get_jenis(){
		$query = $this->db->get_where('msjenispengeluaran', array('flagactive' => 'Y'));
		return $query->result_array();
	}

	public function get_allHeader(){
		$str = "SELECT Bulan, Tahun, ID_HeaderPengeluaran FROM trheaderpengeluaran ORDER BY ID_HeaderPengeluaran desc";
		$query = $this->db->query($str);
		return $query->result_array();
	}

	public function get_currentMonth(){
		$str = "SELECT Bulan, Tahun, DATE_FORMAT(StartDate, '%e %M %Y') as mulai, DATE_FORMAT(EndDate, '%e %M %Y') as selesai, ID_HeaderPengeluaran FROM trheaderpengeluaran WHERE now() BETWEEN StartDate and EndDate";
		$query = $this->db->query($str);
		return $query->result_array();
	}

	public function get_sum($idHeader){
		$str = "SELECT SUM(Debit) as debit, SUM(Kredit) as kredit FROM trdetailpengeluaran WHERE ID_HeaderPengeluaran = '".$idHeader."'";
		$query = $this->db->query($str);
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
        

	public function add_kasHarian($saldo){
		$tipe = $this->input->post('tipe');

		$data = array(
			'ID_HeaderPengeluaran' => $this->input->post('idHeader'),
			'ID_JenisPengeluaran' => $this->input->post('jenis'),
            'Keterangan' => $this->input->post('keterangan'),
            $tipe => $this->input->post('jumlah'),
            'Saldo' => $saldo
		);

		return $this->db->insert('trdetailpengeluaran', $data);
	}
}
