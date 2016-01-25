<?php 
/**
* frontend - blog_model
*/
class Blog_Model extends CI_Model
{
	
	function get_blog_to_showcase($id = null) {
		$this->db->select('pages_link, perma_link, list_title, list_content, list_image');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get('blog');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}
?>