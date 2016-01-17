<?php 
/**
* frontend - site_settings_model
*/
class Site_Settings_Model extends CI_Model
{
	
	function get_settings_name($settings_name) {
		$this->db->where('settings_name', $settings_name);
		$query = $this->db->get('site_settings');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}
?>