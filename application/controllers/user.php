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

        $res = $this->user_model->add_user();
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menambahkan user!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menambahkan user!');
        }
		
		redirect('user/masterUser');
	}

	public function delete_user($idUser){

        $res = $this->user_model->delete_user($idUser);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil menghapus user!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal menghapus user!');
        }
		
		redirect('user/masterUser');
	}

	public function update_user($idUser){

        $res = $this->user_model->update_user($idUser);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil mengubah data user!');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah data user!');
        }
		
		redirect('user/masterUser');
	}

	public function reset_passUser($idUser){

        $res = $this->user_model->reset_passUser($idUser);
        if($res==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil reset password user! (password default : 1234)');
        }else{
            $this->session->set_flashdata('alert','error');
            $this->session->set_flashdata('msg','Gagal mengubah data user!');
        }
		
		redirect('user/masterUser');
	}

	public function get_UserID($idUser){
		$user = $this->user_model->get_userID($idUser);
		$menu = $this->user_model->get_menus();
		$a_menu = $this->user_model->get_authMenu($idUser);
		$a_submenu = $this->user_model->get_authSubmenu($idUser);

		echo form_open('user/authorize');
		if($user==null){
			echo "<h5 style='font-weight:bold;text-align:center;bold;color:#3076cc;'><i class='fa fa-user fa-fw'></i> &nbsp; ID User Salah !</h5><br/>";
		}else{
			foreach ($user as $user_item) {
				echo "<h5 style='font-weight:bold;color:#3076cc;'><i class='fa fa-user fa-fw'></i> &nbsp;".$user_item['NamaUser']." | ".$user_item['ID_User']."</h5><br/>";
			}
			echo "<input type='hidden' name='idUser' value='".$idUser."' >";
			echo "<table class='table table-striped table-bordered table-hover'><thead>";
			echo "<tr>";
			echo "<td>Hak Akses</td>";
			echo "<td>Menu</td>";
			echo "</tr>";
			echo "</thead><tbody>";
			foreach ($menu as $menu_item) {
				echo "<tr>";
				echo "<td align='center'><input type='checkbox' name='menu[]' value='".$menu_item['ID_Menu']."'  id='".$menu_item['Menu']."_head' style='opacity:0;' ";
				foreach ($a_menu as $a_menu_item) {
					if($a_menu_item['ID_Menu']==$menu_item['ID_Menu']){
						echo "checked='true'";
					}
				}
				echo "></td>";
				echo "<td>".$menu_item['Menu']."</td>";
				echo "</tr>";
				$submenu = $this->user_model->get_subMenus($menu_item['ID_Menu']);
				foreach ($submenu as $submenu_item) {
					echo "<tr>";
					echo "<td align='center'><input type='checkbox' name='submenu[]' value='".$submenu_item['ID_Submenu']."' class='".$menu_item['Menu']."_det'";
					foreach ($a_submenu as $a_submenu_item) {
						if($a_submenu_item['ID_Submenu']==$submenu_item['ID_Submenu']){
							echo "checked='true'";
						}
					}
					echo "></td>";
					echo "<td> &emsp; ".$submenu_item['SubMenu']."</td>";
					echo "</tr>";
				}
			}
			echo "</tbody></table>";
			echo "<input type='submit' value='submit' class='btn btn-primary form-control'>";
			foreach ($menu as $menu_item) {
				echo "<script>";
				echo "$('.".$menu_item['Menu']."_det').click(function(){".
					 "	if($('.".$menu_item['Menu']."_det').is(':checked')){".
					 "		$('#".$menu_item['Menu']."_head').prop( 'checked', true );".
					 "	}".
					 "	else if($('.".$menu_item['Menu']."_det').not(':checked')){".
					 "		$('#".$menu_item['Menu']."_head').prop( 'checked', false );".
					 "	}".
					 "});";
				echo "</script>";
			}
	        echo form_close();
	    }
	}

	public function authorize(){

        $res1 = $this->user_model->delete_auth($this->input->post('idUser'));
        $res2 = $this->user_model->insert_auth();
        //if($res1==true || $res2==true){
            $this->session->set_flashdata('alert','success');
            $this->session->set_flashdata('msg','Berhasil memberikan hak akses user!');
        //}else{
            //$this->session->set_flashdata('alert','error');
            //$this->session->set_flashdata('msg','Gagal memberikan hak akses user!');
        //}
      
        redirect('user/hakAkses/');
        //foreach ($_POST['menu'] as $pId)
		//{
		 //   echo $pId." <br/>";

		//}
	}
        
    public function changePassword(){
        $this->load->view('templates/header');
        $this->load->view('user/changePassword');
        $this->load->view('templates/footer');
    }
    
    public function doChangePassword(){
        $id =  $this->session->userdata('ID_User');
        $oldPass = $this->session->userdata('Password');
        $oldPass2 = $this->input->post('oldPass');
        $newPass = $this->input->post('newPass');
        if($oldPass==$oldPass2){
            $this->db->set('Password', $newPass);
            $this->db->where('ID_User', $id);
            $this->db->where('FlagActive', 'Y');
            $this->db->update('msuser'); 
            
            $this->session->set_flashdata('alert','success');
			$this->session->set_flashdata('msg','Sukses mengganti password');
        }else{
            
            $this->session->set_flashdata('alert','error');
			$this->session->set_flashdata('msg','Gagal merubah password');
        }

        $this->load->view('templates/header');
        $this->load->view('user/changePassword');
        $this->load->view('templates/footer');
    }
}
