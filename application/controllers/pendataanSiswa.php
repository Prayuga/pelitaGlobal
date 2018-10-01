<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendataanSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pendataansiswa_model');
        $this->load->model('seragam_model');
                $this->Login_model->keamanan();
	}
	
	// public function index()
	// {
	// 	
	// 	$this->load->view('pendataanSiswa/pendataanSiswaBaru');
	// }

    public function editSiswa($idsiswa = ""){
        $idsiswa = str_ireplace("&","/",$idsiswa);
        
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
            echo"<a href='".base_url()."pendataanSiswa/editSiswa/".str_ireplace("/","&",$row['NomorIndukSiswa'])."' style='font-style:none;' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Ubah Data Siswa'><i class='fa fa-clipboard fa-fw'></i></a> &nbsp;";
            echo"<a target='_blank' href='".base_url()."pendataanSiswa/printSiswa/".str_ireplace("/","&",$row['NomorIndukSiswa'])."' style='font-style:none;' class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Print Data Siswa'><i class='fa fa-print fa-fw'></i></a>";
            echo "</td></tr>";
        }
        echo "</tbody></table>";
        
    }

    public function printSiswa($idsiswa = ""){
        $idsiswa = str_ireplace("&","/",$idsiswa);
        
        $data['siswa'] = $this->pendataansiswa_model->get_siswa($idsiswa);
        $data['ortu'] = $this->pendataansiswa_model->get_ortu($idsiswa);


        $data['agama'] = $this->pendataansiswa_model->get_Agama();
        $data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $data['tahun_ajaran'] = $this->pendataansiswa_model->get_tahunAjaran();
        
        $this->load->view('pendataanSiswa/printSiswa', $data);
    }
	
	public function siswabaru(){
		
		$data['agama'] = $this->pendataansiswa_model->get_Agama();
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $data['tahun_ajaran'] = $this->pendataansiswa_model->get_tahunAjaran();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanSiswaBaru', $data);
		$this->load->view('templates/footer');
	}
    
    public function seragam($idsiswa=null){
        if($idsiswa==null){
            $idsiswa = $this->input->post('siswa');
        }
        $data['siswa'] = $this->pendataansiswa_model->get_siswa($idsiswa);
        $data['kategori'] = $this->pendataansiswa_model->get_Kategori();
        $data['seragam_h'] = $this->seragam_model->getSeragam_siswa($idsiswa);
        $this->load->view('templates/header');
        $this->load->view('pendataanSiswa/pendataanSeragam', $data);
        $this->load->view('templates/footer');
    }
	
	public function kelas(){

		
		$data['kategori'] = $this->pendataansiswa_model->get_Kategori();
                $data['tahun'] = $this->pendataansiswa_model->get_Tahun();
		$this->load->view('templates/header');
		$this->load->view('pendataanSiswa/pendataanKelas', $data);
		$this->load->view('templates/footer');
	}
    
    public function resetKelas(){
        $this->load->view('templates/header');
        $this->load->view('pendataanSiswa/resetKelas');
        $this->load->view('templates/footer');
    }
        
    public function getSiswa_seragam($kat){
        $list = $this->seragam_model->getSiswa_seragam($kat);
        foreach($list->result() as $siswa) {

            echo "<option value='".$siswa->NomorIndukSiswa."'>".$siswa->NamaSiswa."</option>";
        }
    }
    
    public function trx_seragam(){
        $this->seragam_model->delete_trx($this->input->post('idSiswa'));
        $this->seragam_model->add_trx($this->input->post('idSiswa'));
        foreach ($_POST['detail_s'] as $det_s){
            $var = $this->seragam_model->get_stok($det_s);
            foreach ($var as $key) {
                $final = $key['stok'] -1;
            }
            $res=$this->seragam_model->update_trx($final, $det_s);
        }

        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil melakukan pendataan seragam!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal melakukan pendataan seragam!');
        }

        redirect('pendataanSiswa/seragam/'.$idsiswa);
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
		$row[] = '<input type="checkbox" id="cx-'.$no.'" name="chbox[]"
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
    
    public function do_resetKelas(){

        $res = $this->pendataansiswa_model->reset_kelas();
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil me-reset status kelas!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal me-reset status kelas');
        }
        
        redirect('pendataanSiswa/resetKelas/');
    }
    
    public function updateSiswa($idsiswa){

        $res = $this->pendataansiswa_model->update_sw($idsiswa);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah data siswa!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah data siswa!');
        }
        
        redirect('pendataanSiswa/editSiswa/'.$idsiswa);
    }
    
    public function updateOrtu($idsiswa){

        $res = $this->pendataansiswa_model->update_ortu($idsiswa);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah data orang tua!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah data orang tua!');
        }
        
        redirect('pendataanSiswa/editSiswa/'.$idsiswa);
    }
    
    public function updateSurat($idsiswa){

        $res = $this->pendataansiswa_model->update_surat($idsiswa);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah data!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah data!');
        }
        
        redirect('pendataanSiswa/editSiswa/'.$idsiswa);
    }
    
    public function updateAktivasi($idsiswa){

        $res = $this->pendataansiswa_model->update_aktivasi($idsiswa);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah data!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah data!');
        }
        
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
        $data_k = $this->pendataansiswa_model->get_singkatanKelas($kategori);
        foreach ($data_k as $row_k) {
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

        $res = $this->pendataansiswa_model->add_sw($umur, $count, $surat, $kategori_k);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan data siswa! <b>Harap melakukan pengukuran seragam!</b>');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan data siswa!');
        }
        
        redirect('pendataanSiswa/siswabaru');
    }
    
}
