<?php 
/**
* Showcase_Model
*/
class Showcase_Model extends CI_Model
{
	function get_showcase($showcase_id = null) {
		if ($showcase_id != null) {
			$this->db->where('id', $showcase_id);
		}
		$query = $this->db->get('showcase');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function showcase_add() {
		$new_showcase_insert_data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content', FALSE),
			'show_home_page' => $this->input->post('show_home_page'),
			'themes_area_id' => $this->input->post('themes_area_id'),
			'themes_id' => $this->input->post('themes_id'),
			'create_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_showcase_insert_data)->insert('showcase');
		$last_id = $this->db->insert_id();
		foreach ($this->input->post('showcase_to_categories') as $key => $value) {
			$new_showcase_to_categories_insert_data = array(
				'showcase_id' => $last_id,
				'categories_id' => $value
			);
			$this->db->set($new_showcase_to_categories_insert_data)->insert('showcase_to_categories');
		}
		foreach ($this->input->post('showcase_to_blog') as $key => $value) {
			$new_showcase_to_blog_insert_data = array(
				'showcase_id' => $last_id,
				'blog_id' => $value
			);
			$this->db->set($new_showcase_to_blog_insert_data)->insert('showcase_to_blog');
		}
	}
}
?>