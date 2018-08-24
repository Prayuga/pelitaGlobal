<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('tahunajaran_model');
		$this->load->model('Laporan_model');
        $this->load->model('kasRT_model');
	}

    public function kasRT(){
        $this->Login_model->keamanan();
        $data['bulanTahun'] = $this->kasRT_model->get_allHeader();
        $data['jenis'] = $this->kasRT_model->get_jenis();
        $this->load->view('templates/header');
        $this->load->view('laporan/kasRT', $data);
        $this->load->view('templates/footer');
    }

    public function get_kasByJenis(){
        $data = $this->kasRT_model->get_kasJenis();

        echo "<br/><table width='100%' class='table table-striped table-bordered table-hover'><thead><tr>";
        echo "<th>No</th>";
        echo "<th>Keterangan</th>";
        echo "<th>Tanggal</th>";
        echo "<th>Jumlah</th>";
        echo "</tr></thead><tbody>";
        $count=1;
        foreach ($data as $row) {
            $jumlah=$row['jumlah'];
            echo "<tr>";
            echo "<td align='center' width='10%'>".$count."</td>";
            echo "<td align='center' width='25%'>".$row['Keterangan']."</td>";
            echo "<td align='center' width='40%'>".$row['tanggal']."</td>";
            echo "<td align='center' width='25%'>".$row['Kredit']."</td>";
            echo "</tr>";
            $count++;
        }
        echo "</tbody></table>";
        echo "<h4 style='font-weight:bold;' class='pull-right'><button class='btn btn-success'><i class='fa fa-print fa-fw'></i> &nbsp; Print</button> &nbsp; Total : ".$jumlah."</h4>";
    }

    public function get_kasByTanggal(){
        $data = $this->kasRT_model->get_kasTanggal();

        echo "<br/><table width='100%' class='table table-striped table-bordered table-hover'><thead><tr>";
        echo "<th>No.</th>";
        echo "<th>Bulan, Tahun</th>";
        echo "<th>Tanggal</th>";
        echo "<th>Jenis Pengeluaran</th>";
        echo "<th>Keterangan</th>";
        echo "<th>Debit</th>";
        echo "<th>Kredit</th>";
        echo "<th>Saldo</th>";
        echo "</tr></thead><tbody>";
        $count=1;
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td align='center' width='5%'>".$count."</td>";
            echo "<td align='center' width='10%'>".$row['Bulan'].", ".$row['Tahun']."</td>";
            echo "<td align='center' width='10%'>".$row['tanggal']."</td>";
            echo "<td align='center' width='15%'>".$row['JenisPengeluaran']."</td>";
            echo "<td align='center' width='15%'>".$row['Keterangan']."</td>";
            echo "<td align='center' width='15%'>".$row['Debit']."</td>";
            echo "<td align='center' width='15%'>".$row['Kredit']."</td>";
            echo "<td align='center' width='15%'>".$row['Saldo']."</td>";
            echo "</tr>";
            $count++;
        }
        echo "</tbody></table>";
        echo "<button class='btn btn-success'><i class='fa fa-print fa-fw'></i> &nbsp; Print</button>";
    }
	
	public function siswa_all(){
		$this->Login_model->keamanan();
		$data['tahun_ajaran'] = $this->tahunajaran_model->get_TA();
		$data['kategori'] = $this->tahunajaran_model->get_KK();
        $data['kelas'] = $this->tahunajaran_model->get_Kls();
		$this->load->view('templates/header');
		$this->load->view('laporan/laporanSiswaAll', $data);
		$this->load->view('templates/footer');
	}
        
    public function getJsonSiswa(){
        $list = $this->Laporan_model->getSiswa();
        $data = array();
        $no = 0;
        foreach($list->result() as $siswa){
            $no++;
            $row = array();
            $row[] = $siswa->NomorIndukSiswa;
            $row[] = $siswa->NamaSiswa;
            $row[] = $siswa->JenisKelamin;
            $row[] = $siswa->TempatLahir;
            $row[] = $siswa->TanggalLahir;
            $row[] = $siswa->UmurSaatMendaftar;
            $row[] = $siswa->NamaKelas;
            $row[] = $siswa->Agama;
            $row[] = $siswa->NamaAyah;
            $row[] = $siswa->NamaIbu;
            $row[] = $siswa->Alamat;
            $row[] = $siswa->NoTelp;
            
            $data[] = $row;
        }
        $output = array (
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function getSiswaByTahun($thna,$thnb){
        //$kat = $this->input->post('kat');
        $thn = $thna."/".$thnb;
        $list = $this->Laporan_model->getSiswaByTahun($thn);
        $data = array();
        $no = 0;
        foreach($list->result() as $siswa){
            $no++;
            $row = array();
            $row[] = $siswa->NomorIndukSiswa;
            $row[] = $siswa->NamaSiswa;
            $row[] = $siswa->JenisKelamin;
            $row[] = $siswa->TempatLahir;
            $row[] = $siswa->TanggalLahir;
            $row[] = $siswa->UmurSaatMendaftar;
            $row[] = $siswa->NamaKelas;
            $row[] = $siswa->Agama;
            $row[] = $siswa->NamaAyah;
            $row[] = $siswa->NamaIbu;
            $row[] = $siswa->Alamat;
            $row[] = $siswa->NoTelp;
            
            $data[] = $row;
        }
        $output = array (
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function getSiswaByKat($kat){
        $list = $this->Laporan_model->getSiswaByKat($kat);
        $data = array();
        $no = 0;
        foreach($list->result() as $siswa){
            $no++;
            $row = array();
            $row[] = $siswa->NomorIndukSiswa;
            $row[] = $siswa->NamaSiswa;
            $row[] = $siswa->JenisKelamin;
            $row[] = $siswa->TempatLahir;
            $row[] = $siswa->TanggalLahir;
            $row[] = $siswa->UmurSaatMendaftar;
            $row[] = $siswa->NamaKelas;
            $row[] = $siswa->Agama;
            $row[] = $siswa->NamaAyah;
            $row[] = $siswa->NamaIbu;
            $row[] = $siswa->Alamat;
            $row[] = $siswa->NoTelp;
            
            $data[] = $row;
        }
        $output = array (
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function getSiswaByKls($kls){
        $list = $this->Laporan_model->getSiswaByKls($kls);
        $data = array();
        $no = 0;
        foreach($list->result() as $siswa){
            $no++;
            $row = array();
            $row[] = $siswa->NomorIndukSiswa;
            $row[] = $siswa->NamaSiswa;
            $row[] = $siswa->JenisKelamin;
            $row[] = $siswa->TempatLahir;
            $row[] = $siswa->TanggalLahir;
            $row[] = $siswa->UmurSaatMendaftar;
            $row[] = $siswa->NamaKelas;
            $row[] = $siswa->Agama;
            $row[] = $siswa->NamaAyah;
            $row[] = $siswa->NamaIbu;
            $row[] = $siswa->Alamat;
            $row[] = $siswa->NoTelp;
            
            $data[] = $row;
        }
        $output = array (
            "data" => $data,
        );
        echo json_encode($output);
    }
}
