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

    public function add_sw($umur, $count, $surat){
        $data = array(
            'NomorIndukSiswa' => $count,
            'NamaSiswa' => $this->input->post('nama_s'),
            'NamaPanggilan' => $this->input->post('nama_p'),
            'TempatLahir' =>    $this->input->post('tempat_l'),
            'TanggalLahir' =>    $this->input->post('tgl_l'),
            'ID_Agama' => $this->input->post('agama'),
            'Alamat' => $this->input->post('alamat'),
            'NoTelp' =>    $this->input->post('telp'),
            'TinggalPada' =>    $this->input->post('tinggalPada'),
            'JarakRumah' =>    $this->input->post('jarakRumah'),
            'AnakKe' =>    $this->input->post('anak_k'),
            'Dari' =>    $this->input->post('dari'),
            'JumlahSaudaraKandung' =>    $this->input->post('kandung'),
            'JumlahSaudaraAngkat' =>    $this->input->post('angkat'),
            'JumlahSaudaraTiri' =>    $this->input->post('Tiri'),
            'TahunAjaranMasuk' =>    $this->input->post('tahun_ajaran'),
            'ID_Kategori' =>    $this->input->post('kategori'),
            'UmurSaatMendaftar' => $umur,
            'FlagSuratPernyataan' => $surat,
            'BahasaSehariHari' =>    $this->input->post('bahasa'),
            'JenisKelamin' => $this->input->post('jk'),
            'BeratBadan' =>    $this->input->post('berat'),
            'TinggiBadan' =>    $this->input->post('tinggi'),
            'GolonganDarah' =>    $this->input->post('golDar'),
            'RiwayatPenyakit' =>    $this->input->post('riwayat'),
            'PendidikanSebelumnya' =>    $this->input->post('pendidikan_sebelum')
        );
        return $this->db->insert('mssiswa', $data);

        $data_s = array(
            'ID_Siswa' => $count,
            'NamaAyah' => $this->input->post('namaAyah'),
            'NamaIbu' => $this->input->post('namaIbu'),
            'TempatLahirAyah' => $this->input->post('tempat_lAyah'),
            'TempatLahirIbu' => $this->input->post('tempat_lIbu'),
            'TanggalLahirAyah' => $this->input->post('tgl_lAyah'),
            'TanggalLahirIbu' => $this->input->post('tgl_lIbu'),
            'PekerjaanAyah' => $this->input->post('pekerjaanAyah'),
            'PekerjaanIbu' => $this->input->post('pekerjaanIbu'),
            'PekerjaanIbu' => $this->input->post('pekerjaanIbu'),
            'PendidikanAyah' => $this->input->post('pendidikanAyah'),
            'PendidikanIbu' => $this->input->post('pendidikanIbu'),
            'NoTelp' => $this->input->post('telpOrtu'),
            'Alamat' => $this->input->post('alamatOrtu')
        );
        return $this->db->insert('msorangtua', $data_s);
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
    public function get_countSiswa(){
        $sql = "SELECT COUNT(*) as jumlah FROM mssiswa";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
}
