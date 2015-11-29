<?php 
/**
* Site_Settings_Model
*/
class Site_Settings_Model extends CI_Model
{

	function get_site_settings($settings_name = null) {

		if ($settings_name != null) {
			$this->db->where('settings_name',$settings_name);
		}
		$query = $this->db->get('site_settings');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function update_site_settings($images) {
		// var_dump($this->input->post());
		// echo "<br>";
		// in_array ile gelen alanlar varmı onu ogrenip alanlar var ise bu alanların degerini dbye yaz yok ise alanın degerini boşalt.
		$db_rows = $this->get_site_settings();
		foreach ($this->input->post() as $post_key => $post_value) {
			
		}
		foreach ($db_rows as $db_key => $db_value) {
				if ($db_value->settings_name == $post_key) {
					echo "db_name: ".$db_value->settings_name.", post_key: ".$post_key.", post_value: ".$post_value."<br>";
				}
			}
		exit;
		$this->load->helper('rand_helper');
		foreach ($images as $key => $value) {
			if (!empty($value['name'])) {
				unlink(FCPATH.$this->input->post('old_'.$key));
				$randomString = generateRandomString(14);
				$db_img_name[$key] = 'assets/uploads/system/images/'.$key.'_'.$randomString.'-'.$this->changeName($value['name']);
			} else {
				$db_img_name[$key] = $this->input->post('old_'.$key);
			}
			move_uploaded_file($value["tmp_name"], FCPATH.$db_img_name[$key]);
		}
		$site_settings_update_data = array(
			'settings_key' => '',
			'settings_value' => ''
		);
		$this->db->set($site_settings_update_data);
		$this->db->where('settings_name', $this->input->post('id'));
		$this->db->update('site_settings');
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