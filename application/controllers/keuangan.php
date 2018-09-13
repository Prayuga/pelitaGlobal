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
        
        
    public function addKasBulan(){
        $res = $this->kasrt_model->add_kasBulan();
        
        if($res==true){
            $this->session->set_flashdata('alert','alert-success');
            $this->session->set_flashdata('msg','Sukses!');
        }else{
            $this->session->set_flashdata('alert','alert-danger');
            $this->session->set_flashdata('msg','Gagal!');
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
            $this->session->set_flashdata('alert','alert-success');
            $this->session->set_flashdata('msg','Sukses!');
        }else{
            $this->session->set_flashdata('alert','alert-danger');
            $this->session->set_flashdata('msg','Gagal!');
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

}

/* End of file entriKwitansi.php */
/* Location: ./application/controllers/entriKwitansi.php */