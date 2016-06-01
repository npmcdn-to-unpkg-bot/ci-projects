<?php
/**
* frontend - Users_Permissions_Model
*/
class Users_Permissions_Model extends CI_Model
{
	function get_users_permissions($id) {
		$this->db->where('users_id',$id);
		$query = $this->db->get('users_permissions');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function add_users_permissions($id) {
		$new_users_permissions_insert_data = array(
			'users_id' => $id,
			'permissions_id' => $this->input->post('permissions_id'),
		);
		$this->db->set($new_users_permissions_insert_data)->insert('users_permissions');
	}
}
?>