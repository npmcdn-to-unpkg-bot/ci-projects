<?php
/**
* frontend - Categories_Model
*/
class Categories_Model extends CI_Model
{

	function get_categories($id = null) {
		
		if ($id !== null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get('categories');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_perma_link($perma_link) {
		if ($perma_link != null) {
			$this->db->where('perma_link',$perma_link);
		}
		$query = $this->db->get('categories');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_categories_menu($id = null) {
		
		$this->db->select('id, parent_id, perma_link, perma_active, name, description, cat_link');
		if ($id !== null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get('categories');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

}
?>