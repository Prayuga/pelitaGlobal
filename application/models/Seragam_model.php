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
		return $query;
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
}
