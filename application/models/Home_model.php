<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {	

	public function getmenu(){
		$sql = $this->db->query('SELECT a.ID_Menu,a.Menu,a.URL,b.ID_Submenu, b.SubMenu, b.URL from msmenu a LEFT JOIN mssubmenu b ON a.ID_Menu =b.ID_Menu ORDER BY a.ID_Menu asc');

		return $sql->result();
	}

	//SELECT a.ID_Menu,a.Menu,a.URL,b.ID_Submenu, b.SubMenu, b.URL from msmenu a LEFT JOIN mssubmenu b ON a.ID_Menu =b.ID_Menu ORDER BY a.ID_Menu asc
	
}
