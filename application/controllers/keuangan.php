<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->model('kasrt_model');
                $this->load->model('pembayaransiswa_model');
                $this->Login_model->keamanan();
	}

	// public function index()
	// {
	// 	
	// 	$this->load->view('templates/header');
	// 	$this->load->view('keuangan/entriKwitansi');
	// 	$this->load->view('templates/footer');
	// }

	public function kasHarian(){
		
		
		$data['jenis'] = $this->kasrt_model->get_jenis();
		$data['bulanTahun'] = $this->kasrt_model->get_currentMonth();

		$this->load->view('templates/header');
		$this->load->view('keuangan/kasHarian', $data);
		$this->load->view('templates/footer');
	}

	public function kasBulan(){
		
		//$data['jeniskas'] = $this->kasrt_model->get_jenis();
		$this->load->view('templates/header');
		$this->load->view('keuangan/kasBulan'/*, $data*/);
		$this->load->view('templates/footer');
	}

    public function kwitansi(){
        
        //$data['jeniskas'] = $this->kasrt_model->get_jenis();
        $this->load->view('templates/header');
        $this->load->view('keuangan/entriKwitansi'/*, $data*/);
        $this->load->view('templates/footer');
    }
        
        
    public function addKasBulan(){
        $res = $this->kasrt_model->add_kasBulan();
        
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan data!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan data!');
        }
        redirect('keuangan/kasBulan');
    }

    public function entriKasHarian(){
    	$data['saldos'] = $this->kasrt_model->get_sum($this->input->post('idHeader'));
        if($data != NULL){
        	foreach ($data['saldos'] as $row) {
        		$dbt = $row['debit'];
        		$krdt = $row['kredit'];
        		$saldo_awal = $dbt - $krdt;
        	}
        }else{
            $saldo_awal = 0;
        }

    	if($this->input->post('tipe')=='kredit'){
    		$saldo_akhir = $saldo_awal - $this->input->post('jumlah');
    	}else if($this->input->post('tipe')=='debit'){
    		$saldo_akhir = $saldo_awal + $this->input->post('jumlah');
    	}

    	$res = $this->kasrt_model->add_kasHarian($saldo_akhir);
        
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan data!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan data!');
        }

        redirect('keuangan/kasHarian');
    }
    
    public function pembayaranSiswa(){
                
        $data['siswa'] = $this->pembayaransiswa_model->getSiswa();
        $data['jenis'] = $this->pembayaransiswa_model->getHeaderJenis();
		$this->load->view('templates/header');
		$this->load->view('keuangan/pembayaranSiswa',$data);
		$this->load->view('templates/footer');
        
    }

    public function getItemPembayaran($id){
        $data = $this->pembayaransiswa_model->getItemPembayaran($id);
        foreach($data->result() as $row) {
            # code...
            echo '<option value="'.$row->ID_DetailJenisPembayaran.'">'.$row->DetailPembayaran.'</option>';
            
        }
    }

    public function getPembayaranSiswa(){
        $list = $this->pembayaransiswa_model->getPembayaranSiswaAll();
        $data = array();
        $no = 0;
        foreach($list->result() as $sera) {
            $nama = "'".$sera->NamaSiswa."'";
            $namaPem = "'".$sera->DetailPembayaran."'";
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $sera->DetailPembayaran;
            $row[] = $sera->Harga;
            if($sera->Jumlah>0){
                $row[] = $sera->Jumlah;
            }else{
                $row[] = "-";
            }
            $row[] = $sera->Saldo;
            if($sera->StatusLunas=="Y"){
                $row[] = "Lunas";
            }else{
                $row[] = "Belum Lunas";
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Update" onclick="Update('.$sera->ID_HeaderPembayaran.','.$nama.','.$namaPem.','.$sera->ID_DetailJenisPembayaran.')"><i class="glyphicon glyphicon-pencil"></i> Bayar</a>';

            $data[] = $row;
        }

        $output = array (
                "data" => $data,
        );
        echo json_encode($output);
    }


    public function getPembayaranSiswaById(){
        $id = $_GET['id'];
        $jenis = $_GET['jenis'];
        $list = $this->pembayaransiswa_model->getPembayaranSiswa($id,$jenis);
        $data = array();
        $no = 0;
        foreach($list->result() as $sera) {
            $nama = "'".$sera->NamaSiswa."'";
            $namaPem = "'".$sera->DetailPembayaran."'";
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $sera->DetailPembayaran;
            $row[] = $sera->Harga;
            if($sera->Jumlah>0){
                $row[] = $sera->Jumlah;
            }else{
                $row[] = "-";
            }
            $row[] = $sera->Saldo;
            if($sera->StatusLunas=="Y"){
                $row[] = "Lunas";
            }else{
                $row[] = "Belum Lunas";
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Update" onclick="Update('.$sera->ID_HeaderPembayaran.','.$nama.','.$namaPem.','.$sera->ID_DetailJenisPembayaran.')"><i class="glyphicon glyphicon-pencil"></i> Bayar</a>';

            $data[] = $row;
        }

        $output = array (
                "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function addHeaderPembayaranSiswa(){
        $nis = $this->input->post('nis');
        $jenis = $this->input->post('jenis');
        $diskon = $this->input->post('diskonStat');
        $jmldiskon = $this->input->post('jmldiskon');
        $user = $this->session->userdata('ID_User');
        $res = $this->pembayaransiswa_model->addHeaderPembayaranSiswa($nis,$jenis,$diskon,$jmldiskon,$user);
        if($res==true){
            $this->session->set_flashdata('alert','alert-success');
            $this->session->set_flashdata('msg','Sukses!');
        }else{
            $this->session->set_flashdata('alert','alert-danger');
            $this->session->set_flashdata('msg','Gagal!');
        }
        redirect('keuangan/pembayaranSiswa');
    }

    public function addDetailPembayaranSiswa(){
        $id_head = $this->input->post('id_head');
        $id_det = $this->input->post('id_det');
        $jml = $this->input->post('jml');
        $ket = $this->input->post('ket');
        $user = $this->session->userdata('ID_User');
        $res = $this->pembayaransiswa_model->addDetailPembayaranSiswa($id_head,$jml,$ket,$user,$id_det);
        if($res==true){
            $this->session->set_flashdata('alert','alert-success');
            $this->session->set_flashdata('msg','Sukses!');
        }else{
            $this->session->set_flashdata('alert','alert-danger');
            $this->session->set_flashdata('msg','Gagal!');
        }
        redirect('keuangan/pembayaranSiswa');
        
    }

}

/* End of file entriKwitansi.php */
/* Location: ./application/controllers/entriKwitansi.php */
