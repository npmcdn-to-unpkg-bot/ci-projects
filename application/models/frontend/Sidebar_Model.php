<?php 
/**
* frontend - sidebar_model
*/
class Sidebar_Model extends CI_Model
{
	
	function get_sidebar() {
		$query = $this->db->get('sidebar');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	
	function get_leftbar() {
		$this->db->where('which_side','left');
		$query = $this->db->get('sidebar');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	
	function get_rightbar() {
		$this->db->where('which_side','right');
		$query = $this->db->get('sidebar');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}
?>