<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seragam_model extends CI_Model {

	var $table = 'msheaderseragam';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function add($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function addUkuran($id,$ukuran,$stok){
		$query = "insert into msdetailseragam(Id_seragam,ukuran,stok) values";
		$i = 0;
		foreach ($ukuran as $value) {
			$query .= "($id,'$value',$stok),";
		}
		$sql = substr($query, 0, -1);
		$this->db->query($sql);
	}

	public function getSeragam(){
		$this->db->select('Id_seragam, Nama_seragam');
		$this->db->where('flagactive','Y');
		$query = $this->db->get('msheaderseragam');
		return $query->result_array();
	}

	public function getSeragam_siswa($idsiswa){
		$str="SELECT a.Id_seragam, a.Nama_seragam FROM msheaderseragam as a, mssiswa as b WHERE a.JK = 'Campur' UNION SELECT a.Id_seragam, a.Nama_seragam FROM msheaderseragam as a, mssiswa as b WHERE a.JK = b.JenisKelamin AND b.NomorIndukSiswa = '".$idsiswa."' ";
		$query = $this->db->query($str);
		return $query->result_array();
	}

	public function get_stok($id){
		$str = "select  b.Id_detailseragam, a.Nama_seragam, a.JK, b.ukuran, b.stok from msheaderseragam a, msdetailseragam b WHERE a.Id_seragam = b.Id_seragam and b.Id_detailseragam = ".$id." and b.flagactive = 'Y'";
		$query = $this->db->query($str);
		return $query->result_array();
	}

	public function getDetailSeragam(){
		$str = " select b.ID_detailseragam, a.Nama_seragam, a.JK, b.ukuran, b.stok from msheaderseragam a, msdetailseragam b WHERE a.Id_seragam = b.Id_seragam and b.flagactive = 'Y'";
		$query = $this->db->query($str);
		return $query;
	}

	public function getStok($id){
		$str = "select  b.Id_detailseragam, a.Nama_seragam, a.JK, b.ukuran, b.stok from msheaderseragam a, msdetailseragam b WHERE a.Id_seragam = b.Id_seragam and b.Id_detailseragam = ".$id." and b.flagactive = 'Y'";
		$query = $this->db->query($str);
		return $query->row();
	}

	public function updateStok($id, $stok){
		$query = "update msdetailseragam set stok = ".$stok." where Id_detailseragam = ".$id."";
		$this->db->query($query);
	}

	public function delSeragam($id){
		$query = "update msdetailseragam set flagactive = 'N' where Id_detailseragam = ".$id."";
		$this->db->query($query);
	}
    public function getSiswa_seragam($kat){
        $query = $this->db->get_where('mssiswa', array('ID_Kategori' => $kat, 'FlagActive' => 'Y'));
        return $query;
    }

    public function delete_trx($idsiswa){
		$this->db->where('NomorIndukSiswa', $idsiswa);
		$this->db->delete('trseragam');

    }

    public function add_trx($idsiswa){
    	foreach ($_POST['detail_s'] as $det_s) {
			$data = array(
				'NomorIndukSiswa' => $idsiswa,
				'ID_DetailSeragam' => $det_s
			);

			$this->db->insert('trseragam', $data);
    	}
    }

    public function update_trx($final, $det_s){
    	$data = array(
			'stok' => $final
		);

		$this->db->where('ID_detailseragam', $det_s);
		return $this->db->update('msdetailseragam', $data);
    }
}
