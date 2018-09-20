<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}	

	// public function get_s(){
	// 	$query = $this->db->get_where('msstationary', array('flagactive' => 'Y'));
	// 	return $query->result_array();
	// }

	// public function add_s(){
	// 	$data = array(
	// 		'NamaStationary' => $this->input->post('nama'),
	// 		'Stok' => $this->input->post('stok'),
	// 		'Satuan' =>	$this->input->post('satuan')
	// 	);

	// 	return $this->db->insert('msstationary', $data);
	// }

	// public function update_s($id_stationary){
	// 	$data = array(
	// 		'NamaStationary' => $this->input->post('nama'),
	// 		'Stok' => $this->input->post('stok'),
	// 		'Satuan' =>	$this->input->post('satuan')
	// 	);

	// 	$this->db->where('id_stationary', $id_stationary);
	// 	return $this->db->update('msstationary', $data);
	// }

	// public function delete_s($id_stationary){
	// 	$data = array(
	// 		'flagactive' => 'N'
	// 	);

	// 	$this->db->where('id_stationary', $id_stationary);
	// 	return $this->db->update('msstationary', $data);
	// }
        
        public function getSiswa(){
            $str = "SELECT a.NomorIndukSiswa,"
                    . "a.NamaSiswa,a.JenisKelamin,a.TempatLahir,"
                    . "a.TanggalLahir,a.UmurSaatMendaftar,b.NamaKelas,"
                    . "d.Agama,c.NamaAyah,c.NamaIbu,a.Alamat,a.NoTelp "
                    . "from mssiswa a,msheaderkelas b,msorangtua c,msagama d "
                    . "where a.NomorIndukSiswa = c.ID_Siswa and a.ID_Kelas = b.ID_Kelas "
                    . "and a.ID_Agama = d.ID_Agama and a.FlagActive='Y' ";
            $query = $this->db->query($str);
            return $query;
        }
        
        public function getSiswaByTahun($thn){
            $str = "SELECT a.NomorIndukSiswa, a.NamaSiswa,a.JenisKelamin,a.TempatLahir, a.TanggalLahir,a.UmurSaatMendaftar,b.NamaKelas, d.Agama,c.NamaAyah,c.NamaIbu,a.Alamat,a.NoTelp from mssiswa a,msheaderkelas b,msorangtua c,msagama d where a.NomorIndukSiswa = c.ID_Siswa and a.ID_Kelas = b.ID_Kelas and a.ID_Agama = d.ID_Agama and a.FlagActive='Y' and "
                    . "b.ID_TahunAjaran = '".$thn."' ";
            $query = $this->db->query($str);
            return $query;
        }
        
        public function getSiswaByKat($kat){
            $str = "SELECT a.NomorIndukSiswa, a.NamaSiswa,a.JenisKelamin,a.TempatLahir, a.TanggalLahir,a.UmurSaatMendaftar,b.NamaKelas, d.Agama,c.NamaAyah,c.NamaIbu,a.Alamat,a.NoTelp from mssiswa a,msheaderkelas b,msorangtua c,msagama d where a.NomorIndukSiswa = c.ID_Siswa and a.ID_Kelas = b.ID_Kelas and a.ID_Agama = d.ID_Agama and a.FlagActive='Y' "
                    . " and a.ID_Kategori = ".$kat." ";
            $query = $this->db->query($str);
            return $query;
        }
        
        public function getSiswaByKls($kls){
            $str = "SELECT a.NomorIndukSiswa, a.NamaSiswa,a.JenisKelamin,a.TempatLahir, a.TanggalLahir,a.UmurSaatMendaftar,b.NamaKelas, d.Agama,c.NamaAyah,c.NamaIbu,a.Alamat,a.NoTelp from mssiswa a,msheaderkelas b,msorangtua c,msagama d where a.NomorIndukSiswa = c.ID_Siswa and a.ID_Kelas = b.ID_Kelas and a.ID_Agama = d.ID_Agama and a.FlagActive='Y' "
                    . " and a.ID_Kelas = ".$kls." ";
            $query = $this->db->query($str);
            return $query;
        }

        public function getPembayaranGlobal($jenis, $ta, $lunas){
        		if($jenis==null){
	        		$str="CALL `getPembayaranGlobal`('".$this->input->post('jenis')."', '".$this->input->post('tahunAjaran')."', '".$this->input->post('lunas')."')";
        		}else{
	        		$str="CALL `getPembayaranGlobal`('".$jenis."', '".$ta."', '".$lunas."')";
        		}
	        	
	        	//$str="select d.NamaSiswa, b.DetailPembayaran, a.Saldo, a.Jumlah, a.StatusLunas from trheaderpembayaran as a, msdetailjenispembayaran b, mstahunajaran as c, mssiswa as d WHERE a.ID_DetailJenisPembayaran in (SELECT f.ID_DetailJenisPembayaran FROM msdetailjenispembayaran as f WHERE f.ID_HeaderJenisPembayaran ='".$this->input->post('jenis')."') AND a.ID_TahunAjaran = '".$this->input->post('tahunAjaran')."' AND a.StatusLunas = '".$this->input->post('lunas')."' AND a.ID_DetailJenisPembayaran = b.ID_DetailJenisPembayaran AND a.ID_TahunAjaran = c.ID_TahunAjaran AND a.NomorIndukSiswa = d.NomorIndukSiswa";
	        	$query = $this->db->query($str);
	        	return $query->result_array();
        }

        public function getHeaderPembayaranGlobal($jenis){
        	if($jenis==null){
        		$str="SELECT ID_DetailJenisPembayaran, DetailPembayaran FROM msdetailjenispembayaran where ID_HeaderJenisPembayaran = '".$this->input->post('jenis')."' ";
        	}else{
        		$str="SELECT ID_DetailJenisPembayaran, DetailPembayaran FROM msdetailjenispembayaran where ID_HeaderJenisPembayaran = '".$jenis."' ";
        	}
        	$query = $this->db->query($str);
        	return $query->result_array();
        }
}
