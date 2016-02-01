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

	function get_showcase_to_categories($id) {
		$this->db->where('showcase_id', $id);
		$query = $this->db->get('showcase_to_categories');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_showcase_to_blog($id) {
		$this->db->where('showcase_id', $id);
		$query = $this->db->get('showcase_to_blog');
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
		if (!empty($this->input->post('showcase_to_categories'))) {
			foreach ($this->input->post('showcase_to_categories') as $key => $value) {
				$new_showcase_to_categories_insert_data = array(
					'showcase_id' => $last_id,
					'categories_id' => $value
				);
				$this->db->set($new_showcase_to_categories_insert_data)->insert('showcase_to_categories');
			}
		}
		if (!empty($this->input->post('showcase_to_blog'))) {
			foreach ($this->input->post('showcase_to_blog') as $key => $value) {
				$new_showcase_to_blog_insert_data = array(
					'showcase_id' => $last_id,
					'blog_id' => $value
				);
				$this->db->set($new_showcase_to_blog_insert_data)->insert('showcase_to_blog');
			}
		}
		
	}

	function showcase_update() {
		$showcase_update_data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content', FALSE),
			'show_home_page' => $this->input->post('show_home_page'),
			'themes_area_id' => $this->input->post('themes_area_id'),
			'themes_id' => $this->input->post('themes_id')
		);
		$this->db->set($showcase_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('showcase');

		$this->db->where('showcase_id', $this->input->post('id'));
		$this->db->delete('showcase_to_categories');

		$this->db->where('showcase_id', $this->input->post('id'));
		$this->db->delete('showcase_to_blog');

		if ($this->input->post('showcase_to_categories')) {
			foreach ($this->input->post('showcase_to_categories') as $key => $value) {
				$showcase_to_categories_update_data = array(
					'showcase_id' => $this->input->post('id'),
					'categories_id' => $value
				);
				$this->db->set($showcase_to_categories_update_data)->insert('showcase_to_categories');
			}
		}
		if ($this->input->post('showcase_to_blog')) {
			foreach ($this->input->post('showcase_to_blog') as $key => $value) {
				$showcase_to_blog_update_data = array(
					'showcase_id' => $this->input->post('id'),
					'blog_id' => $value
				);
				$this->db->set($showcase_to_blog_update_data)->insert('showcase_to_blog');
			}	
		}
	}

	function showcase_delete() {
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('showcase');

		$this->db->where('showcase_id', $this->input->post('id'));
		$this->db->delete('showcase_to_blog');

		$this->db->where('showcase_id', $this->input->post('id'));
		$this->db->delete('showcase_to_categories');

		$this->db->where('showcase_id', $this->input->post('id'));
		$this->db->delete('blog_to_showcase');
	}

	function get_blog_to_showcase($showcase_id = null) {
		if ($showcase_id != null) {
			$this->db->where('showcase_id', $showcase_id);
		}
		$query = $this->db->get('blog_to_showcase');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function blog_to_showcase_add() {
		// echo "<pre>";var_dump($this->input->post());exit;
		$this->db->where('showcase_id', $this->input->post('id'));
		$this->db->delete('blog_to_showcase');

		if ($this->input->post('blog_to_showcase')) {
			foreach ($this->input->post('blog_to_showcase') as $key => $value) {
				$blog_to_showcase_new_data = array(
					'showcase_id' => $this->input->post('id'),
					'themes_area_id' => $this->input->post('themes_area_id'),
					'themes_id' => $this->input->post('themes_id'),
					'blog_id' => $value,
				);
				$this->db->set($blog_to_showcase_new_data)->insert('blog_to_showcase');
			}
		}
	}

}
?>