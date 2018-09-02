<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function hakAkses(){
		$this->Login_model->keamanan();
		$this->load->view('templates/header');
		$this->load->view('user/hakAkses');
		$this->load->view('templates/footer');
	}
	
	public function masterUser(){
		$this->Login_model->keamanan();
        $data['user'] = $this->user_model->get_user();
        $data['jumlah'] =$this->user_model->get_countUser();

		$this->load->view('templates/header');
		$this->load->view('user/masterUser', $data);
		$this->load->view('templates/footer');
	}

	public function add_user(){
		$this->user_model->add_user();
		redirect('user/masterUser');
	}

	public function delete_user($idUser){
		$this->user_model->delete_user($idUser);
		redirect('user/masterUser');
	}

	public function update_user($idUser){
		$this->user_model->update_user($idUser);
		redirect('user/masterUser');
	}

	public function reset_passUser($idUser){
		$this->user_model->reset_passUser($idUser);
		redirect('user/masterUser');
	}

	public function get_UserID($idUser){
		$menu = $this->user_model->get_menus();

		echo "<table border='1'><thead>";
		echo "<tr>";
		echo "<td>Hak Akses</td>";
		echo "<td>Menu</td>";
		echo "</tr>";
		foreach ($menu as $menu_item) {
			echo "<tr>";
			echo "<td><input type='checkbox' name='".$menu_item['ID_Menu']."' value='Y' checked></td>";
			echo "<td>".$menu_item['Menu']."</td>";
			echo "</tr>";
			$submenu = $this->user_model->get_subMenus($menu_item['ID_Menu']);
			foreach ($submenu as $submenu_item) {
				echo "<tr>";
				echo "<td><input type='checkbox' name='".$submenu_item['ID_Submenu']."' value='Y'></td>";
				echo "<td> &emsp; ".$submenu_item['SubMenu']."</td>";
				echo "</tr>";
			}
		}
		echo "</thead></table>";

	}
}
