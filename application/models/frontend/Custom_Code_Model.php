<?php 
/**
* frontend - custom_code_model
*/
class Custom_Code_Model extends CI_Model
{

	function get_head_code() {
		$this->db->where('custom_code_name', 'custom_head_code');
		$query = $this->db->get('custom_code');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_foot_code() {
		$this->db->where('custom_code_name', 'custom_foot_code');
		$query = $this->db->get('custom_code');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}
?>