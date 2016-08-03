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

	function get_blog_groupby($groupby = null) {
		$this->db->select($groupby);
		if ($groupby != null) {
			$this->db->group_by($groupby);
		}
		$query = $this->db->get('blog');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	
	function blog_add($images) {
		$this->load->helper('rand_helper');
		$new_blog_insert_data = array(
			'pages_type' => $this->input->post('pages_type'),
			'quick_link' => $this->input->post('quick_link'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content', FALSE),
			'list_title' => $this->input->post('list_title'),
			'list_content' => $this->input->post('list_content'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_title' => $this->input->post('meta_title'),
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_blog_insert_data)->insert('blog');
		$last_id = $this->db->insert_id();
		foreach ($images as $key => $value) {
			if (!empty($value['name'])) {
				$randomString = generateRandomString(14);
				$db_img_name[$key] = 'assets/uploads/system/images/'.$key.'_'.$randomString.'-'.$this->changeName($value['name']);
			} else {
				$db_img_name[$key] = '';
			}
			move_uploaded_file($value["tmp_name"], FCPATH.$db_img_name[$key]);
			$blog_add_image = array(
				'list_image' => $db_img_name[$key]
			);
			$this->db->set($blog_add_image);
			$this->db->set('pages_link','blog/'.$last_id);
			$this->db->where('id', $last_id);
			$this->db->update('blog');
		}
	}

	function blog_update($images) {
		$this->load->helper('rand_helper');
		$blog_update_data = array(
			'pages_type' => $this->input->post('pages_type'),
			'perma_link' => $this->input->post('perma_link'),
			'perma_active' => $this->input->post('perma_active'),
			'quick_link' => $this->input->post('quick_link'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content', FALSE),
			'list_title' => $this->input->post('list_title'),
			'list_content' => $this->input->post('list_content'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_title' => $this->input->post('meta_title'),
		);
		$this->db->set($blog_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('blog');
		foreach ($images as $key => $value) {
			if (!empty($value['name'])) {
				if (!empty($this->input->post('old_'.$key))) {
					unlink(FCPATH.$this->input->post('old_'.$key));
				}
				$randomString = generateRandomString(14);
				$db_img_name[$key] = 'assets/uploads/system/images/'.$key.'_'.$randomString.'-'.$this->changeName($value['name']);
			} else {
				$db_img_name[$key] = $this->input->post('old_'.$key);
			}
			if ($this->input->post('delete_'.$key)) {
				unlink(FCPATH.$this->input->post('delete_'.$key));
				$db_img_name[$key] = '';
			}
			move_uploaded_file($value["tmp_name"], FCPATH.$db_img_name[$key]);
			$blog_update_image = array(
				'list_image' => $db_img_name[$key]
			);
			$this->db->set($blog_update_image);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('blog');
		}
	}

	function blog_delete() {
		$get_blog_ = $this->get_blog($this->input->post('id'));
		foreach ($get_blog_ as $key => $value) {
			if (!empty($value->list_image)) {
				unlink(FCPATH.$value->list_image);
			}
			$this->db->where('id',$value->id);
			$this->db->delete('blog');
		}
	}

	public function changeName($change_name){

		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', ' ');
		$do = array('C', 'S', 'G', 'U', 'I', 'O', 'c', 's', 'g', 'u', 'o', 'i', '-');
		$perma = str_replace($find, $do, $change_name);
		$perma = preg_replace("@[^A-Za-z0-9\.\-_]@i", '', $perma);
		return $perma;
	}
}
?>