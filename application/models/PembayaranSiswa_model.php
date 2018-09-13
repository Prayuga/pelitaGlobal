<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranSiswa_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        
        public function getSiswa(){
            $str = "SELECT NomorIndukSiswa, NamaSiswa from mssiswa where FlagActive = 'Y' ";
            $query = $this->db->query($str);
            return $query->result_array();
        }

        public function getHeaderJenis(){
        	$str = "SELECT ID_HeaderJenisPembayaran, JenisPembayaran from msheaderjenispembayaran";
            $query = $this->db->query($str);
            return $query->result_array();
        }

    
}