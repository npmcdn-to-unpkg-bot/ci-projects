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

	function user_info($username) {

		$this->db->where('username',$username);
		$this->db->join('users_details udetails', 'udetails.users_id = users.id');
		$query = $this->db->get('users');
		return $query->row();
		
	}

	function update_member() {

		$this->db->where('username', $this->session->userdata('username'));
		$result = $this->db->get('users');
		$users_id = $result->row()->id;
		$users_email = $result->row()->email;
		
		if ($users_email != $this->input->post('email')) {
			
			$this->db->where('email', $this->input->post('email'));
			$q = $this->db->get('users');
			if ($q->num_rows()>0) {
				return "email_available";
			}
		}

		$users_update_data = array(
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname')
		);
		$users_details_update_data = array(
			'gsm' => $this->input->post('gsm'),
			'phone' => $this->input->post('phone'),
			'phone2' => $this->input->post('phone2'),
			'address' => $this->input->post('address'),
			'corporation' => $this->input->post('corporation'),
			'seniority' => $this->input->post('seniority'),
			'tc_no' => $this->input->post('tc_no')
		);

		

		$this->db->set($users_update_data);
		$this->db->where('id',$users_id);
		$update = $this->db->update('users');
		
		$this->db->set($users_details_update_data);
		$this->db->where('users_id',$users_id);
		$update2 = $this->db->update('users_details');
		
		if ($update && $update2) {
			// var_dump($update);
			// var_dump($update2);
			// exit;
			return TRUE;
		}

	}
}
?>