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

        public function getItemPembayaran($id){
            $this->db->select('ID_DetailJenisPembayaran, DetailPembayaran');
            $this->db->where('flagactive','Y');
            $this->db->where('ID_HeaderJenisPembayaran',$id);
            $query = $this->db->get('msdetailjenispembayaran');
            return $query;
        }

        public function getPembayaranSiswaAll(){
            $str = "SELECT a.ID_HeaderPembayaran,b.DetailPembayaran,b.Harga,a.Saldo,a.StatusLunas from trheaderpembayaran a, msdetailjenispembayaran b where a.ID_DetailJenisPembayaran = b.ID_DetailJenisPembayaran and a.StatusLunas = 'N' ";
            $query = $this->db->query($str);
            return $query;
        }

        public function getPembayaranSiswa($id,$jenis){
            $str = "SELECT b.DetailPembayaran,b.Harga,a.Saldo,a.StatusLunas from trheaderpembayaran a, msdetailjenispembayaran b, msheaderjenispembayaran c where a.ID_DetailJenisPembayaran = b.ID_DetailJenisPembayaran and b.ID_HeaderJenisPembayaran = c.ID_HeaderJenisPembayaran and a.StatusLunas = 'N' and a.NomorIndukSiswa = '".$id."' and c.ID_HeaderJenisPembayaran = ".$jenis." ";
            $query = $this->db->query($str);
            return $query;
        }

    
}