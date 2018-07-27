<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {	
	
	public function ambillogin($username, $password)
	{
		$this->load->library('session');

		$this->db->where('ID_User', $username);
		$this->db->where('Password', $password);
		$query = $this->db->get('MsUser');
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$sess = array('ID_User' =>	$row->ID_User,
								'password' => $row->Password,
								'NamaUser' => $row->NamaUser,
								'logged_in' => TRUE
				);
			}

			$this->session->set_userdata($row);
			redirect('home');
		}
		else{
			$this->session->set_flashdata('info', 'Wrong password or user ID!');
			redirect('home');//--?--
		}

	}

	public function keamanan(){
		$usern = $this->session->userdata('ID_User');
		if(empty($usern)){
			$this->session->sess_destroy();
			header('Location: '.base_url('login'));
			//redirect('');
		}else{

		}

	}
}
