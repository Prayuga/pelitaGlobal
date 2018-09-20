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
            $str = "SELECT a.ID_HeaderPembayaran,b.DetailPembayaran,CONCAT('Rp', FORMAT(b.Harga, 2)) as Harga,CONCAT('Rp', FORMAT((b.harga-a.Jumlah)-a.Saldo,2)) as Saldo,a.StatusLunas,a.Jumlah, c.NamaSiswa, a.ID_DetailJenisPembayaran from trheaderpembayaran a, msdetailjenispembayaran b,mssiswa c where a.ID_DetailJenisPembayaran = b.ID_DetailJenisPembayaran and a.NomorIndukSiswa = c.NomorIndukSiswa and a.StatusLunas = 'N' ";
            $query = $this->db->query($str);
            return $query;
        }

        public function getPembayaranSiswa($id,$jenis){
            $str = "SELECT a.ID_HeaderPembayaran,b.DetailPembayaran,CONCAT('Rp', FORMAT(b.Harga, 2)) as Harga,CONCAT('Rp', FORMAT((b.harga-a.Jumlah)-a.Saldo,2)) as Saldo,a.StatusLunas,a.Jumlah, d.NamaSiswa, a.ID_DetailJenisPembayaran from trheaderpembayaran a, msdetailjenispembayaran b, msheaderjenispembayaran c, mssiswa d where a.ID_DetailJenisPembayaran = b.ID_DetailJenisPembayaran and b.ID_HeaderJenisPembayaran = c.ID_HeaderJenisPembayaran and a.NomorIndukSiswa = d.NomorIndukSiswa and a.StatusLunas = 'N' and a.NomorIndukSiswa = '".$id."' and c.ID_HeaderJenisPembayaran = ".$jenis." ";
            $query = $this->db->query($str);
            return $query;
        }
        
        public function addHeaderPembayaranSiswa($nis,$jenis,$diskon,$jmldiskon,$user){
            if($diskon=='Y'){
                $data = array(
                  'NomorIndukSiswa' => $nis,
                  'ID_DetailJenisPembayaran' => $jenis,
                    'Discount' => $diskon,
                    'Jumlah' =>$jmldiskon ,
                    'ID_User' =>$user,
                );
            }else{
                $data = array(
                  'NomorIndukSiswa' => $nis,
                  'ID_DetailJenisPembayaran' => $jenis,
                    'ID_User' =>$user,
                );
            }
            $this->db->insert('trheaderpembayaran', $data);
        }

        public function addDetailPembayaranSiswa($id_head,$jml,$ket,$user,$id_det){
            $str = " CALL setTrDetailPembayaran('".$id_head."','".$jml."','".$ket."','".$user."','".$id_det."')";
            $query = $this->db->query($str);
            return $query;

        }
        
        

    
}