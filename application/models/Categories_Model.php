<?php 
/**
* Categories_Model
*/
class Categories_Model extends CI_Model
{
	
	function get_categories_list($cat_id = null) {

		$this->db->select('id, parent_id, status, cat_link, name, queue');
		$query = $this->db->get('categories');
		if ($cat_id !== null) {
			$this->db->where('id', $cat_id);
			$query = $this->db->get('categories');
		}
		
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}

	function get_categories($cat_id = null) {

		$query = $this->db->get('categories');
		if ($cat_id !== null) {
			$this->db->where('id', $cat_id);
			$query = $this->db->get('categories');
		}
		
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}

	function add_categories($images, $config) {

		$new_categories_insert_data = array(
			'parent_id' => $this->input->post('parent_id'),
			'status' => $this->input->post('status'),
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
		foreach ($images as $key => $value) {
			// echo $value["tmp_name"]." - ".$config['upload_path'].$value['name']."<br>";
			move_uploaded_file($value["tmp_name"], $config['upload_path'].'catid_'.$last_id.'-'.$value['name']);
			if ($image_uploads[$key]) {
				$db_img[$key] = 'catid_'.$last_id.'-'.$value['name'];
				echo "image var";
			} else {
				echo "iamge yok";
			}
			
		}
		exit;
		$this->db->set('image', $db_img['image']);
		$this->db->set('banner', $db_img['banner']);
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
}
?>