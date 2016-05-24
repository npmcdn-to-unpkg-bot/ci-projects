<?php
/**
* frontend - Users_Address_Model
*/
class Users_Address_Model extends CI_Model
{
	function get_users_address($id) {
		$this->db->where('users_id',$id);
		$query = $this->db->get('users_address');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function add_users_address($id) {
		$new_users_address_insert_data = array(
			'users_id' => $id,
			'phone' => $this->input->post('phone'),
			'phone2' => $this->input->post('phone2'),
			'gsm' => $this->input->post('gsm'),
			'company' => $this->input->post('company'),
			'city_id' => $this->input->post('city_id'),
			'county_id' => $this->input->post('county_id'),
			'district_id' => $this->input->post('district_id'),
			'neighborhood_id' => $this->input->post('neighborhood_id'),
			'address' => $this->input->post('address')
		);
		$this->db->set($new_users_address_insert_data)->insert('users_address');
	}
}
?>