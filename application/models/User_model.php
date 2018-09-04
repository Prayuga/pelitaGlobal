<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$query = $this->db->get_where('msuser', array('flagactive' => 'Y'));
        return $query->result_array();
	}

	public function get_userID($idUser){
		$query = $this->db->get_where('msuser', array('ID_User' => $idUser));
        return $query->result_array();
	}

	public function get_authMenu($idUser){
		$query = $this->db->get_where('trauthorizemenu', array('ID_User' => $idUser));
        return $query->result_array();
	}

	public function get_authSubmenu($idUser){
		$query = $this->db->get_where('trauthorizesubmenu', array('ID_User' => $idUser));
        return $query->result_array();
	}

	public function get_menus(){
		$query = $this->db->get_where('msmenu', array('flagactive' => 'Y'));
        return $query->result_array();
	}

	public function get_subMenus($idMenu){
		$query = $this->db->get_where('mssubmenu', array('flagactive' => 'Y', 'ID_Menu' => $idMenu));
        return $query->result_array();
	}

	public function get_countUser(){
		$str = "SELECT COUNT(ID_User) as jumlah FROM msuser";
		$query = $this->db->query($str);
		return $query->result_array();
	}

	public function add_user(){
		$data = array(
			'ID_User' => $this->input->post('idUser'),
			'NamaUser' => $this->input->post('nama'),
			'Password' => $this->input->post('password'),
			'UpdatedBy' => $this->session->userdata('ID_User')
		);

		return $this->db->insert('msuser', $data);
	}

	public function update_user($idUser){
		$data = array(
			'NamaUser' => $this->input->post('nama'),
			'UpdatedBy' =>	$this->session->userdata('ID_User')
		);

		$this->db->where('ID_User', $idUser);
		return $this->db->update('msuser', $data);
	}

	public function reset_passUser($idUser){
		$data = array(
			'Password' => $this->input->post('password'),
			'UpdatedBy' =>	$this->session->userdata('ID_User')
		);

		$this->db->where('ID_User', $idUser);
		return $this->db->update('msuser', $data);
	}

	public function delete_user($idUser){
		$this->db->where('ID_User', $idUser);
		return $this->db->delete('msuser');
	}

	public function delete_auth($idUser){
		$this->db->where('ID_User', $idUser);
		$this->db->delete('trauthorizemenu');

		$this->db->where('ID_User', $idUser);
		$this->db->delete('trauthorizesubmenu');
    }
    
    public function insert_auth(){
    	foreach ($_POST['menu'] as $menu) {
			$data = array(
				'ID_User' => $this->input->post('idUser'),
				'ID_Menu' => $menu
			);

			$this->db->insert('trauthorizemenu', $data);
    	}

    	foreach ($_POST['submenu'] as $submenu) {
			$data = array(
				'ID_User' => $this->input->post('idUser'),
				'ID_Submenu' => $submenu
			);

			$this->db->insert('trauthorizesubmenu', $data);
    	}
    }

}