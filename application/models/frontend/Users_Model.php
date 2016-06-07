<?php
/**
* frontend - Users_Model
*/
class Users_Model extends CI_Model
{
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('users');
		if ($query->num_rows()>0) {
			$res = $query->result()[0]->password;
			$res_pass = $this->encryption->decrypt($res);
			if ($this->input->post('password')===$res_pass) {
				if ($query->num_rows() == 1) {
					return true;
				}
			}	
		}
	}

	function get_perm_users() {

		$userdata = array();

		$this->db->where('username', $this->input->post('username'));
		$users = $this->db->get('users');
		$users = $users->result();

		$this->db->select('permissions.name');
		$this->db->where('users_id', $users[0]->id);
		$this->db->join('permissions','permissions.id = users_permissions.permissions_id');
		$u_perm = $this->db->get('users_permissions');
		$u_perm = $u_perm->result();

		foreach ($users as $key => $value) {
			$userdata = $value;
			foreach ($u_perm as $u_perm_key => $u_perm_value) {
				$u_perm_name = $u_perm_value->name;
				$userdata->$u_perm_name = $u_perm_value->name;
			}
		}
		return $userdata;
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

	function get_users() {
		$get_users_result = $this->db->query('SELECT users.*,users_address.*,permissions.id AS perm_id, permissions.name AS perm_name FROM users JOIN users_address ON users.id = users_address.users_id JOIN users_permissions ON users.id = users_permissions.users_id RIGHT JOIN permissions ON users_permissions.permissions_id = permissions.id WHERE users.id = '.$this->session->userdata('user_id'));
		return $get_users_result->result();
	}

	function add_users() {
		$new_users_insert_data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'password' => $this->encryption->encrypt($this->input->post('password')),
			'gender' => $this->input->post('gender'),
			'date_of_birth' => $this->input->post('date_of_birth'),
			'day_of_birth' => $this->input->post('day_of_birth'),
			'month_of_birth' => $this->input->post('month_of_birth'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_users_insert_data)->insert('users');
		$last_add_users_id = $this->db->insert_id();
		if ($this->input->post('users_address')) {
			$this->load->model('frontend/users_address_model');
			$this->users_address_model->add_users_address($last_add_users_id);
		}
		if ($this->input->post('permissions_id')) {
			$this->load->model('frontend/users_permissions_model');
			$this->users_permissions_model->add_users_permissions($last_add_users_id);
		}
	}
}
?>