<?php 
/**
* Banner_Model
*/
class Banner_Model extends CI_Model
{
	
	function get_banner($target = null,$banner_type = null) {
		if ($target != null) {
			$this->db->where('target', $target);
		}
		if ($banner_type != null) {
			$this->db->where('banner_type', $banner_type);
		}
		$this->db->order_by('queue', 'ASC');
		$query = $this->db->get('banner');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function banner_add($images) {
		// echo "<pre>banner_model";var_dump($this->input->post());exit;
		$this->load->helper('rand_helper');
		$new_banner_insert_data = array(
			'banner_type'=> $this->input->post('banner_type'),
			'target'=> $this->input->post('target'),
			'link'=> $this->input->post('link'),
			'alt_text'=> $this->input->post('alt_text'),
			'create_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_banner_insert_data)->insert('banner');
		$last_id = $this->db->insert_id();
		foreach ($images as $key => $value) {
			if (!empty($value['name'])) {
				$randomString = generateRandomString(14);
				$db_img_name[$key] = 'assets/uploads/system/images/'.$this->input->post('target').'_'.$last_id.'_'.$randomString.'-'.$this->changeName($value['name']);
			} else {
				$db_img_name[$key] = '';
			}
			move_uploaded_file($value["tmp_name"], FCPATH.$db_img_name[$key]);
		}
		$this->db->set('image', $db_img_name['image']);
		$this->db->where('id',$last_id);
		$this->db->update('banner');
	}

	function banner_delete() {
		unlink(FCPATH.$this->input->post('image'));
		$this->db->where('id',$this->input->post('id'));
		$this->db->delete('banner');
	}

	function banner_move() {
		$banner_move_update_data = array(
			'queue' => $this->input->post('queue'),
		);
		$this->db->set($banner_move_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('banner');
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