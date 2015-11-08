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
		echo "dikkat modeldesin.<br>";
		foreach ($images as $key => $value) {
			// echo $value["tmp_name"]." - ".$config['upload_path'].$value['name']."<br>";
			if (move_uploaded_file($value["tmp_name"], $config['upload_path'].$value['name'])) {
				echo basename( $value["name"])." yüklenmiştir.";
			} else {
				echo "dosyanız hatalıdır.";
			}
		}
		exit;
		$new_categories_insert_data = array(
			'parent_id' => $this->input->post('parent_id'),
			'status' => $this->input->post('status'),
			// 'cat_link' => $this->input->post('cat_link'),
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'image' => $this->input->post('image'),
			'banner' => $this->input->post('banner'),
			'queue' => $this->input->post('queue'),
			'list_layout' => $this->input->post('list_layout'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_title' => $this->input->post('meta_title'),
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_categories_insert_data)->insert('categories');
	}
}
?>