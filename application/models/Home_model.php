<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {	

	/*public function getmenu(){
		$sql = $this->db->query('SELECT a.ID_Menu,a.Menu,a.URL,b.ID_Submenu, b.SubMenu, b.URL from msmenu a LEFT JOIN mssubmenu b ON a.ID_Menu =b.ID_Menu ORDER BY a.ID_Menu asc');

		return $sql->result();
	}*/

	//SELECT a.ID_Menu,a.Menu,a.URL,b.ID_Submenu, b.SubMenu, b.URL from msmenu a LEFT JOIN mssubmenu b ON a.ID_Menu =b.ID_Menu ORDER BY a.ID_Menu asc

	public function get_ultah(){
        $str = "select a.NomorIndukSiswa, a.NamaSiswa, DATE_FORMAT(a.TanggalLahir, '%e %M %Y') as TanggalLahir,b.SingkatanKategori, c.NamaKelas from mssiswa as a, mskategorikelas as b, msheaderkelas as c WHERE c.ID_Kategori = b.ID_Kategori and a.ID_Kelas = c.ID_Kelas and month(a.TanggalLahir) = month(CURRENT_DATE) and date(a.TanggalLahir) = date(CURRENT_DATE) and a.FlagActive = 'Y'";
        $query = $this->db->query($str);
        return $query->result_array();
	}

    public function get_surat(){
        $query = $this->db->get_where('mssiswa', array('FlagSuratPernyataan' => 'N', 'FlagActive' => 'Y'));
        return $query->result_array();
    }
	
}
