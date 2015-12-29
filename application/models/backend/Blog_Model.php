<?php 
/**
* Blog_Model
*/
class Blog_Model extends CI_Model
{

	function get_blog($blog_id = null) {
		if ($blog_id != null) {
			$this->db->where('id', $blog_id);
		}
		$query = $this->db->get('blog');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	
	function blog_add() {
		$new_blog_insert_data = array(
			'pages_type' => 'pages_type',
			'pages_link' => 'pages_link',
			'perma_link' => 'perma_link',
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content', FALSE),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_title' => $this->input->post('meta_title'),
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_blog_insert_data)->insert('blog');
	}

	function blog_update() {
		$blog_update_data = array(
			'pages_type' => 'pages_type',
			'pages_link' => 'pages_link',
			'perma_link' => 'perma_link',
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content', FALSE),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_title' => $this->input->post('meta_title'),
		);
		$this->db->set($blog_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('blog');
	}

	function blog_delete($blog_id) {
		$this->db->where('id', $blog_id);
		$this->db->delete('blog');
	}
}
?>