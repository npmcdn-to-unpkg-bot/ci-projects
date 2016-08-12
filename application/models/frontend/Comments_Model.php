<?php 
/**
* Comments_Model
*/
class Comments_Model extends CI_Model
{
	function get_blog_comments($blog_id) {
		if ($blog_id != null) {
			$this->db->where('blog_id',$blog_id);
			$this->db->where('enable',1);
		}
		$query = $this->db->get('comments');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function blog_comments_add() {
		$new_blog_comments_insert_data = array(
			'blog_id' => $this->input->post('blog_id'),
			'user_id' => $this->input->post('user_id'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'email' => $this->input->post('email'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_blog_comments_insert_data)->insert('comments');
	}
}
?>