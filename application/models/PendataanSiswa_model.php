<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendataanSiswa_model extends CI_Model {

    
	public function __construct(){
		parent::__construct();
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
        
        public function getSiswaBaru(){
                $str = "Select NomorIndukSiswa,NamaSiswa FROM `mssiswa` where ID_Kelas is NULL";
                $query = $this->db->query($str);
                return $query;
        }
        
	public function get_Tahun(){
		$query = $this->db->get_where('mstahunajaran', array('flagactive' => 'Y'));
		return $query->result_array();
	}

    public function get_tahunAjaran(){
        $query = $this->db->get_where('mstahunajaran', array('flagactive' => 'Y'));
        return $query->result_array();
    }

    public function add_sw(){
        $data = array(
            //disini
                'NamaSiswa' => $this->input->post('nama_s'),
                'Stok' => $this->input->post('jk'),
                'Satuan' =>	$this->input->post('satuan')
        );
        return $this->db->insert('mssiswa', $data);
    }

    public function get_u($tgl, $kategori){
        $sql = "call getUmur('".$tgl."','".$kategori."')";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
        public function getKelas($thn, $kat){
                $this->db->select('ID_Kelas,NamaKelas');
                $query = $this->db->get_where('msheaderkelas', array('ID_Kategori'=> $kat,'ID_TahunAjaran'=>$thn,'flagactive' => 'Y') );
                //return $this->db->last_query(); cek query string
                return $query;
        }
        
        public function updateKelas($id, $ar){
            $str = "update mssiswa set ID_Kelas = ".$id." where NomorIndukSiswa = '".$ar."'";
            $str2 = "insert into msdetailkelas values (NULL,".$id.",".$ar.",'Y')";
            $this->db->query($str);
            $this->db->query($str2);
            return $this->db->last_query();
        }
}
