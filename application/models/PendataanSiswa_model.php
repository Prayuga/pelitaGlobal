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

    public function get_singkatanKelas($idKategori){
        $query = $this->db->get_where('mskategorikelas', array('ID_Kategori' => $idKategori));
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

    public function get_siswa($idsiswa){
        $query = $this->db->get_where('mssiswa', array('NomorIndukSiswa' => $idsiswa));
        return $query->result_array();
    }

    public function get_ortu($idsiswa){
        $query = $this->db->get_where('msorangtua', array('ID_Siswa' => $idsiswa));
        return $query->result_array();
    }

    public function get_listSiswa(){ 
        $jenis = $this->input->post('jenis'); 
        $isi = $this->input->post('isi'); 

        $sql = "SELECT * FROM mssiswa WHERE ".$jenis." LIKE '%".$isi."%' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function add_sw($umur, $count, $surat, $kategori_k){

        $Jumlah = $count;
        $NamaSiswa = $this->input->post('nama_s');
        $NamaPanggilan = $this->input->post('nama_p');
        $TempatLahir =    $this->input->post('tempat_l');
        $TanggalLahir =    $this->input->post('tgl_l');
        $ID_Agama = $this->input->post('agama');
        $Alamat = $this->input->post('alamat');
        $NoTelp =    $this->input->post('telp');
        $TinggalPada =    $this->input->post('tinggalPada');
        $JarakRumah =    $this->input->post('jarakRumah');
        $AnakKe =    $this->input->post('anak_k');
        $Dari =    $this->input->post('dari');
        $JumlahSaudaraKandung =    $this->input->post('kandung');
        $JumlahSaudaraAngkat =    $this->input->post('angkat');
        $JumlahSaudaraTiri =    $this->input->post('Tiri');
        $TahunAjaranMasuk =    $this->input->post('tahun_ajaran');
        $ID_Kategori =    $this->input->post('kategori');
        $UmurSaatMendaftar = $umur;
        $FlagSuratPernyataan = $surat;
        $BahasaSehariHari =    $this->input->post('bahasa');
        $JenisKelamin = $this->input->post('jk');
        $BeratBadan =    $this->input->post('berat');
        $TinggiBadan =    $this->input->post('tinggi');
        $GolonganDarah =    $this->input->post('golDar');
        $RiwayatPenyakit =    $this->input->post('riwayat');
        $PendidikanSebelumnya =    $this->input->post('pendidikan_sebelum');
        $alergi =    $this->input->post('alergi');

        $numlength = strlen((string)$Jumlah);
        if($numlength==1){
            $Jumlah_new="00".$Jumlah;
        }else if($numlength==2){
            $Jumlah_new="0".$Jumlah;
        }else if($numlength==3){
            $Jumlah_new=$Jumlah;
        }
        $NomorIndukSiswa = substr($TahunAjaranMasuk,0,4).$kategori_k."/".$Jumlah_new."/PGM";
        
        $ID_Siswa = $NomorIndukSiswa;
        $NamaAyah = $this->input->post('namaAyah');
        $NamaIbu = $this->input->post('namaIbu');
        $TempatLahirAyah = $this->input->post('tempat_lAyah');
        $TempatLahirIbu = $this->input->post('tempat_lIbu');
        $TanggalLahirAyah = $this->input->post('tgl_lAyah');
        $TanggalLahirIbu = $this->input->post('tgl_lIbu');
        $PekerjaanAyah = $this->input->post('pekerjaanAyah');
        $PekerjaanIbu = $this->input->post('pekerjaanIbu');
        $PendidikanAyah = $this->input->post('pendidikanAyah');
        $PendidikanIbu = $this->input->post('pendidikanIbu');
        $telpOrtu = $this->input->post('telpOrtu');
        $alamatOrtu = $this->input->post('alamatOrtu');

        $data = array(
            'ID_Siswa' => $ID_Siswa,
            'NamaAyah' => $NamaAyah,
            'NamaIbu' => $NamaIbu,
            'TempatLahirAyah' => $TempatLahirAyah,
            'TempatLahirIbu' => $TempatLahirIbu,
            'TanggalLahirAyah' => $TanggalLahirAyah,
            'TanggalLahirIbu' => $TanggalLahirIbu,
            'PekerjaanAyah' => $PekerjaanAyah,
            'PekerjaanIbu' => $PekerjaanIbu,
            'PendidikanIbu' => $PendidikanIbu,
            'PendidikanAyah' => $PendidikanAyah,
            'PendidikanIbu' => $PendidikanIbu,
            'NoTelp' => $telpOrtu,
            'Alamat' => $alamatOrtu
        );
        $this->db->set($data);
        $this->db->insert('msorangtua');

        $data_s = array(
            'NomorIndukSiswa' => $NomorIndukSiswa,
            'NamaSiswa' => $NamaSiswa,
            'NamaPanggilan' => $NamaPanggilan,
            'TempatLahir' =>    $TempatLahir,
            'TanggalLahir' =>    $TanggalLahir,
            'ID_Agama' => $ID_Agama,
            'Alamat' => $Alamat,
            'NoTelp' =>    $NoTelp,
            'TinggalPada' =>    $TinggalPada,
            'JarakRumah' =>    $JarakRumah,
            'AnakKe' =>    $AnakKe,
            'Dari' =>    $Dari,
            'JumlahSaudaraKandung' =>    $JumlahSaudaraKandung,
            'JumlahSaudaraAngkat' =>    $JumlahSaudaraAngkat,
            'JumlahSaudaraTiri' =>    $JumlahSaudaraTiri,
            'TahunAjaranMasuk' =>    $TahunAjaranMasuk,
            'ID_Kategori' =>    $ID_Kategori,
            'UmurSaatMendaftar' => $umur,
            'FlagSuratPernyataan' => $surat,
            'BahasaSehariHari' =>    $BahasaSehariHari,
            'JenisKelamin' => $JenisKelamin,
            'BeratBadan' =>    $BeratBadan,
            'TinggiBadan' =>    $TinggiBadan,
            'GolonganDarah' =>    $GolonganDarah,
            'RiwayatPenyakit' =>    $RiwayatPenyakit,
            'PendidikanSebelumnya' =>    $PendidikanSebelumnya,
            'Alergi' => $alergi
        );
        return $this->db->insert('mssiswa', $data_s);
    }

    public function update_sw($idsiswa){
        $idsiswa = str_ireplace("&","/",$idsiswa);
        $NamaSiswa = $this->input->post('nama_s');
        $NamaPanggilan = $this->input->post('nama_p');
        $TempatLahir =    $this->input->post('tempat_l');
        $TanggalLahir =    $this->input->post('tgl_l');
        $ID_Agama = $this->input->post('agama');
        $Alamat = $this->input->post('alamat');
        $NoTelp =    $this->input->post('telp');
        $TinggalPada =    $this->input->post('tinggalPada');
        $JarakRumah =    $this->input->post('jarakRumah');
        $AnakKe =    $this->input->post('anak_k');
        $Dari =    $this->input->post('dari');
        $JumlahSaudaraKandung =    $this->input->post('kandung');
        $JumlahSaudaraAngkat =    $this->input->post('angkat');
        $JumlahSaudaraTiri =    $this->input->post('Tiri');
        $BahasaSehariHari =    $this->input->post('bahasa');
        $JenisKelamin = $this->input->post('jk');
        $BeratBadan =    $this->input->post('berat');
        $TinggiBadan =    $this->input->post('tinggi');
        $GolonganDarah =    $this->input->post('golDar');
        $RiwayatPenyakit =    $this->input->post('riwayat');
        $PendidikanSebelumnya =    $this->input->post('pendidikan_sebelum');
        $alergi =    $this->input->post('alergi');



        $data = array(
            'NamaSiswa' => $NamaSiswa,
            'NamaPanggilan' => $NamaPanggilan,
            'TempatLahir' =>    $TempatLahir,
            'TanggalLahir' =>    $TanggalLahir,
            'ID_Agama' => $ID_Agama,
            'Alamat' => $Alamat,
            'NoTelp' =>    $NoTelp,
            'TinggalPada' =>    $TinggalPada,
            'JarakRumah' =>    $JarakRumah,
            'AnakKe' =>    $AnakKe,
            'Dari' =>    $Dari,
            'JumlahSaudaraKandung' =>    $JumlahSaudaraKandung,
            'JumlahSaudaraAngkat' =>    $JumlahSaudaraAngkat,
            'JumlahSaudaraTiri' =>    $JumlahSaudaraTiri,
            'BahasaSehariHari' =>    $BahasaSehariHari,
            'JenisKelamin' => $JenisKelamin,
            'BeratBadan' =>    $BeratBadan,
            'TinggiBadan' =>    $TinggiBadan,
            'GolonganDarah' =>    $GolonganDarah,
            'RiwayatPenyakit' =>    $RiwayatPenyakit,
            'PendidikanSebelumnya' =>    $PendidikanSebelumnya,
            'alergi' => $alergi
        );

        $this->db->where('NomorIndukSiswa', $idsiswa);
        return $this->db->update('mssiswa', $data);
    }

    public function update_ortu($idsiswa){
        $idsiswa = str_ireplace("&","/",$idsiswa);
        $NamaAyah = $this->input->post('namaAyah');
        $NamaIbu = $this->input->post('namaIbu');
        $TempatLahirAyah = $this->input->post('tempat_lAyah');
        $TempatLahirIbu = $this->input->post('tempat_lIbu');
        $TanggalLahirAyah = $this->input->post('tgl_lAyah');
        $TanggalLahirIbu = $this->input->post('tgl_lIbu');
        $PekerjaanAyah = $this->input->post('pekerjaanAyah');
        $PekerjaanIbu = $this->input->post('pekerjaanIbu');
        $PendidikanAyah = $this->input->post('pendidikanAyah');
        $PendidikanIbu = $this->input->post('pendidikanIbu');
        $telpOrtu = $this->input->post('telpOrtu');
        $alamatOrtu = $this->input->post('alamatOrtu');

        $data = array(
            'NamaAyah' => $NamaAyah,
            'NamaIbu' => $NamaIbu,
            'TempatLahirAyah' => $TempatLahirAyah,
            'TempatLahirIbu' => $TempatLahirIbu,
            'TanggalLahirAyah' => $TanggalLahirAyah,
            'TanggalLahirIbu' => $TanggalLahirIbu,
            'PekerjaanAyah' => $PekerjaanAyah,
            'PekerjaanIbu' => $PekerjaanIbu,
            'PendidikanIbu' => $PendidikanIbu,
            'PendidikanAyah' => $PendidikanAyah,
            'PendidikanIbu' => $PendidikanIbu,
            'NoTelp' => $telpOrtu,
            'Alamat' => $alamatOrtu
        );

        $this->db->where('ID_Siswa', $idsiswa);
        return $this->db->update('msorangtua', $data);

    }

    public function update_surat($idsiswa){
        $idsiswa = str_ireplace("&","/",$idsiswa);

        $data = array(
            'FlagSuratPernyataan' => $this->input->post('status')
        );

        $this->db->where('NomorIndukSiswa', $idsiswa);
        return $this->db->update('mssiswa', $data);

    }

    public function update_aktivasi($idsiswa){
        $idsiswa = str_ireplace("&","/",$idsiswa);

        $data = array(
            'FlagActive' => $this->input->post('status')
        );

        $this->db->where('NomorIndukSiswa', $idsiswa);
        return $this->db->update('mssiswa', $data);

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
