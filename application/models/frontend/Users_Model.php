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
		$get_users_result = $this->db->query('SELECT u.id, u.username, u.email, u.name, u.surname, u.gender, u.date_of_birth, u.day_of_birth, u.month_of_birth, u.year_of_birth, ua.phone, ua.phone2, ua.gsm, ua.company, ua.county_id, ua.city_id, ua.district_id, ua.neighborhood_id, ua.address FROM users AS u JOIN users_address AS ua ON u.id = ua.users_id WHERE u.id = '.$this->session->userdata('user_id'));
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

	function update_users() {
		$users_update_data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'gender' => $this->input->post('gender'),
			'date_of_birth' => $this->input->post('date_of_birth'),
			'day_of_birth' => $this->input->post('day_of_birth'),
			'month_of_birth' => $this->input->post('month_of_birth'),
			'year_of_birth' => $this->input->post('year_of_birth')
		);
		$this->db->set($users_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users');

		if ($this->input->post('users_address')) {
			$this->load->model('frontend/users_address_model');
			$this->users_address_model->update_users_address($this->input->post('id'));
		}
	}

	function update_changemypassword() {
		$update_changemypassword_data = array(
			'password' => $this->encryption->encrypt($this->input->post('password')),
		);
		$this->db->set($update_changemypassword_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users');
	}

	function check_old_password($old_password) {
		$this->db->select('password');
		$this->db->where('id',$this->input->post('id'));
		$old_pass = $this->db->get('users');
		return $old_pass->result()[0]->password;
	}
}
?>