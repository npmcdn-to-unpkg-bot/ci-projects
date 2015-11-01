<?php 
/**
* Categories_Model
*/
class Categories_Model extends CI_Model
{
	
	function get_categories_list($cat_id = null) {

		$this->db->select('id, parent_id, status, cat_link, name, queue');
		$query = $this->db->get('categories');
		if ($cat_id !== null) {
			$this->db->where('id', $cat_id);
			$query = $this->db->get('categories');
		}
		
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}

	function get_categories($cat_id = null) {

		$query = $this->db->get('categories');
		if ($cat_id !== null) {
			$this->db->where('id', $cat_id);
			$query = $this->db->get('categories');
		}
		
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}
}
?>