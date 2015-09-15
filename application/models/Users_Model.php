<?php 
/**
* Users_Model
*/
class Users_Model extends CI_Model
{
	
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('users');
		// echo "<pre>";
		// var_dump($query->num_rows());
		// echo "<pre>";
		// exit;
		if ($query->num_rows()===1) {
			$res = $query->result()[0]->password;
			$res_pass = $this->encryption->decrypt($res);
			if ($this->input->post('password')===$res_pass) {
				if ($query->num_rows() == 1) {
					return true;
				}
			}	
		}
	}

	function create_member() {

		$username = $this->input->post('username');

		$new_member_insert_data = array(
			'name' 		=> $this->input->post('name'),
			'surname' 	=> $this->input->post('surname'),
			'email' 	=> $this->input->post('email'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->encryption->encrypt($this->input->post('password')),
			'created_time' => date("Y-m-d H:i:s")
		);

		$insert = $this->db->insert('users',$new_member_insert_data);

		return $insert;

	}

	function check_if_username_exists($username) {

		$this->db->where('username',$username);
		$result = $this->db->get('users');

		if ($result->num_rows() > 0) {
			return FALSE; // username taken
		} else {
			return TRUE; // username can be reg'd
		}

	}

	function check_if_email_exists($email) {

		$this->db->where('email',$email);
		$result = $this->db->get('users');

		if ($result->num_rows() > 0) {
			return FALSE; // email taken
		} else {
			return TRUE; // email can be reg'd
		}

	}
}
?>