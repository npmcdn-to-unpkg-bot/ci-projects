<?php 
/**
* Themes_Model
*/
class Themes_Model extends CI_Model
{
	
	function get_themes_area() {

		$query = $this->db->get('themes_area');
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}

	function get_themes_area_where($id) {

		$this->db->where('id',$id);
		$query = $this->db->get('themes_area');
		if ($query->num_rows()>0) {
			
			return $result = $query->result();
		}
	}

	function get_themes_area_parent($parent_id = null) {
		
		if ($parent_id) {
			// echo "get_themes_area_parent = if";
			$this->db->where('parent_id',$parent_id);
			$query = $this->db->get('themes_area');
			if ($query->num_rows()>0) {

				return $result = $query->result();
			}
		} else {
			// echo "get_themes_area_parent = else";
			$this->db->where('parent_id',0);
			$query = $this->db->get('themes_area');
			if ($query->num_rows()>0) {

				return $result = $query->result();
			}
		}
	}

	function get_themes($themes_area_id) {
		
		$this->db->where('themes_area_id',$themes_area_id);
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {
			
			return $result = $query->result();
		}
	}

	
}
?>