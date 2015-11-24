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
}
?>