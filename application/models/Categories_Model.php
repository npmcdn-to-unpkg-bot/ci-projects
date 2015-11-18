<?php 
/**
* Categories_Model
*/
class Categories_Model extends CI_Model
{
	
	function get_categories($cat_id = null) {

		if ($cat_id !== null) {
			$this->db->where('id', $cat_id);
		}
		$query = $this->db->get('categories');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function add_categories($images) {
		if (empty($this->input->post('status'))) {
			$status = 0;
		} else {
			$status = 1;
		}
		$new_categories_insert_data = array(
			'parent_id' => $this->input->post('parent_id'),
			'status' => $status,
			// 'cat_link' => $this->input->post('cat_link'),
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'queue' => $this->input->post('queue'),
			'list_layout' => $this->input->post('list_layout'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_title' => $this->input->post('meta_title'),
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_categories_insert_data)->insert('categories');
		$last_id = $this->db->insert_id();
		$this->load->helper('rand_helper');
		foreach ($images as $key => $value) {
			if (!empty($value['name'])) {
				$randomString = generateRandomString(14);
				$db_img_name[$key] = 'assets/uploads/system/images/catid_'.$last_id.'_'.$randomString.'-'.$this->changeName($value['name']);
			} else {
				$db_img_name[$key] = '';
			}
			move_uploaded_file($value["tmp_name"], FCPATH.$db_img_name[$key]);
		}
		$this->db->set('image', $db_img_name['image']);
		$this->db->set('banner', $db_img_name['banner']);
		$this->db->where('id',$last_id);
		$this->db->update('categories');
	}

	public function changeName($change_name){

		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', ' ');
		$do = array('C', 'S', 'G', 'U', 'I', 'O', 'c', 's', 'g', 'u', 'o', 'i', '-');
		$perma = str_replace($find, $do, $change_name);
		$perma = preg_replace("@[^A-Za-z0-9\.\-_]@i", '', $perma);
		return $perma;
	}

	public function delete_categories($cat_id) {

		$category = array();
		foreach ($cat_id as $key => $value) {
			$category[$value] = $this->get_categories($value);
		}
		foreach ($category as $key => $value) {
			if (!empty($category[$key][0]->image)) {
				unlink(FCPATH.$category[$key][0]->image);
			}
			if (!empty($category[$key][0]->banner)) {
				unlink(FCPATH.$category[$key][0]->banner);
			}
			$this->db->where('id',$category[$key][0]->id);
			$this->db->delete('categories');
		}
		$this->session->set_flashdata('errors','kategori silindi.');
		redirect('backend/categories');
	}
}
?>