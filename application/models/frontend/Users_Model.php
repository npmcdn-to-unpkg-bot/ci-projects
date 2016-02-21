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

	function get_users() {

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
}
?>