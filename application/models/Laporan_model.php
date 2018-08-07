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
}
