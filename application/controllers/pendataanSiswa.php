<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendataanSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pendataansiswa_model');
	}
	
	// public function index()
	// {
	// 	$this->Login_model->keamanan();
	// 	$this->load->view('pendataanSiswa/pendataanSiswaBaru');
	// }

    public function editSiswa($idsiswa = ""){
        $idsiswa = str_ireplace("&","/",$idsiswa);
        $this->Login_model->keamanan();
        $data['siswa'] = $this->pendataansiswa_model->get_siswa($idsiswa);
        $data['ortu'] = $this->pendataansiswa_model->get_ortu($idsiswa);


        $data['agama'] = $this->pendataansiswa_model->get_Agama();
        $data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $data['tahun_ajaran'] = $this->pendataansiswa_model->get_tahunAjaran();

        $this->load->view('templates/header');
        $this->load->view('pendataanSiswa/editSiswa', $data);
        $this->load->view('templates/footer');
    }

    public function cariSiswa(){
        $data = $this->pendataansiswa_model->get_listSiswa();

        echo "<table width='100%' class='table table-striped table-bordered table-hover'><thead><tr>";
        echo "<th>Nomor Induk Siswa</th>";
        echo "<th>Nama Siswa</th>";
        echo "<th>Action</th>";
        echo "</tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td align='center' width='35%'>".$row['NomorIndukSiswa']."</td>";
            echo "<td align='center' width='40%'>".$row['NamaSiswa']."</td>";
            echo "<td align='center' width='25%'>";
            echo"<a href='http://localhost:81/pelitaGlobal/pendataanSiswa/editSiswa/".str_ireplace("/","&",$row['NomorIndukSiswa'])."' style='font-style:none;' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Ubah Data Siswa'><i class='fa fa-clipboard fa-fw'></i></a> &nbsp;";
            echo"<a target='_blank' href='http://localhost:81/pelitaGlobal/pendataanSiswa/printSiswa/".str_ireplace("/","&",$row['NomorIndukSiswa'])."' style='font-style:none;' class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Print Data Siswa'><i class='fa fa-print fa-fw'></i></a>";
            echo "</td></tr>";
        }
        echo "</tbody></table>";
        
    }

    public function printSiswa($idsiswa = ""){
        $idsiswa = str_ireplace("&","/",$idsiswa);
        $this->Login_model->keamanan();
        $data['siswa'] = $this->pendataansiswa_model->get_siswa($idsiswa);
        $data['ortu'] = $this->pendataansiswa_model->get_ortu($idsiswa);


        $data['agama'] = $this->pendataansiswa_model->get_Agama();
        $data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $data['tahun_ajaran'] = $this->pendataansiswa_model->get_tahunAjaran();
        
        $this->load->view('pendataanSiswa/printSiswa', $data);
    }
	
	public function siswabaru(){
		$this->Login_model->keamanan();
		$data['agama'] = $this->pendataansiswa_model->get_Agama();
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $data['tahun_ajaran'] = $this->pendataansiswa_model->get_tahunAjaran();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanSiswaBaru', $data);
		$this->load->view('templates/footer');
	}
	
	public function kelas(){

		$this->Login_model->keamanan();
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
                $data['tahun'] = $this->pendataansiswa_model->get_Tahun();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanKelas', $data);
		$this->load->view('templates/footer');
	}
        
    public function getJsonKelas(){
	$list = $this->pendataansiswa_model->getSiswaBaru();
	$data = array();
	$no = 0;
	foreach($list->result() as $siswa) {
		$no ++;
		$row = array();
		$row[] = $siswa->NomorIndukSiswa;
		$row[] = $siswa->NamaSiswa;
		$row[] = '<input type="checkbox" id="cx-'.$siswa->NomorIndukSiswa.'" name="chbox[]"
           value="'.$siswa->NomorIndukSiswa.'" />';

		$data[] = $row;
	}

	$output = array (
			"data" => $data,
	);
	echo json_encode($output);
    }
    
    public function updateKelas(){
        $id = $this->input->post('id');
        $arr = $this->input->post('array');
        foreach($arr as $ar){
            $this->pendataansiswa_model->updateKelas($id, $ar);
        }
    }
    
    public function updateSiswa($idsiswa){
        $this->pendataansiswa_model->update_sw($idsiswa);
        redirect('pendataanSiswa/editSiswa/'.$idsiswa);
    }
    
    public function updateOrtu($idsiswa){
        $this->pendataansiswa_model->update_ortu($idsiswa);
        redirect('pendataanSiswa/editSiswa/'.$idsiswa);
    }
    
    public function updateSurat($idsiswa){
        $this->pendataansiswa_model->update_surat($idsiswa);
        redirect('pendataanSiswa/editSiswa/'.$idsiswa);
    }
    
    public function getKelas(){
        $thn = $this->input->post('thn');
        $kat = $this->input->post('kat');
        $data = $this->pendataansiswa_model->getKelas($thn, $kat);
        echo '<option class="form-control" value="">-- Pilih Kelas --</option>';
        foreach($data->result() as $row){
                echo '<option class="form-control" value="'.$row->ID_Kelas.'">'.$row->NamaKelas.'</option>';
        }
    }

    public function get_umur(){
        $tgl = $this->input->post('tgl');
        $kategori = $this->input->post('kategori');
        $data = $this->pendataansiswa_model->get_u($tgl, $kategori);
        $year = date("Y");
        foreach ($data as $row) {
            echo "* Umur per-Oktober ".$year." : ".$row['tahun']." tahun ".$row['bulan']." bulan ";
            if($row['stat'] == 'N'){
                echo ", Umur Kurang";
            }
        }
    }

    public function add_siswa(){
        $tgl = $this->input->post('tgl_l');
        $kategori = $this->input->post('kategori');
        $data_k = $this->pendataansiswa_model->get_singkatanKategori($kategori);
        foreach ($data as $row_k) {
            $kategori_k=$row_k['SingkatanKategori'];
            
        }
        $data = $this->pendataansiswa_model->get_u($tgl, $kategori);
        foreach ($data as $row) {
            $umur = $row['tahun']." tahun ".$row['bulan']." bulan";
            if($row['stat'] == 'N'){
                $surat = 'N';
            }else{
                $surat = '-';
            }
            
        }

        $data_s = $this->pendataansiswa_model->get_countSiswa();
        foreach ($data_s as $row_s) {
            $count = $row_s['jumlah']+1;
        }

        $this->pendataansiswa_model->add_sw($umur, $count, $surat, $kategori_k);
        redirect('pendataanSiswa/siswabaru');
    }
    
}
