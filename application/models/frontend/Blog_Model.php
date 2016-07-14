<?php 
/**
* frontend - blog_model
*/
class Blog_Model extends CI_Model
{
	function get_blog($id = null) {
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get('blog');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_blog_to_showcase($id = null) {
		$this->db->select('id, pages_link, list_title, list_content, list_image');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get('blog');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_quick_link() {
		$this->db->select('id, pages_type, pages_link, title');
		$this->db->where('quick_link','1');
		$query = $this->db->get('blog');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

}
?>