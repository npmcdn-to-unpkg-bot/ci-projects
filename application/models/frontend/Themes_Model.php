<?php 
/**
* frontend - themes
*/
class Themes_Model extends CI_Model
{
	function get_themes($id = null) {
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_themes_area($id = null) {
		if ($id != null) {
			$this->db->where('themes_area_id',$id);
			$this->db->where('active_themes_id',1);
		}
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	
	function get_themes_class_name($class_name) {
		// themes_area table class_name header olan id si themes table themes_area_id aynı ve active_themes_id = 1 
		$this->db->select('themes_area.id,themes_area.class_name,themes.themes_area_id,themes.active_themes_id,themes.file_path,themes.create_time,themes.update_time');
		$this->db->from('themes_area');
		$this->db->where('class_name',$class_name);
		$this->db->join('themes', 'themes.themes_area_id = themes_area.id');
		$this->db->where('active_themes_id',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	/*function get_footer() {
		// themes_area table class_name footer olan id si themes table themes_area_id aynı ve active_themes_id = 1 
		$this->db->select('themes_area.id,themes_area.class_name,themes.themes_area_id,themes.active_themes_id,themes.file_path,themes.create_time,themes.update_time');
		$this->db->from('themes_area');
		$this->db->where('class_name','footer');
		$this->db->join('themes', 'themes.themes_area_id = themes_area.id');
		$this->db->where('active_themes_id',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	
	function get_home() {
		// themes_area table class_name footer olan id si themes table themes_area_id aynı ve active_themes_id = 1 
		$this->db->select('themes_area.id,themes_area.class_name,themes.themes_area_id,themes.active_themes_id,themes.file_path,themes.create_time,themes.update_time');
		$this->db->from('themes_area');
		$this->db->where('class_name','home');
		$this->db->join('themes', 'themes.themes_area_id = themes_area.id');
		$this->db->where('active_themes_id',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_slider() {
		// themes_area table class_name footer olan id si themes table themes_area_id aynı ve active_themes_id = 1 
		$this->db->select('themes_area.id,themes_area.class_name,themes.themes_area_id,themes.active_themes_id,themes.file_path,themes.create_time,themes.update_time');
		$this->db->from('themes_area');
		$this->db->where('class_name','slider');
		$this->db->join('themes', 'themes.themes_area_id = themes_area.id');
		$this->db->where('active_themes_id',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_banner() {
		// themes_area table class_name footer olan id si themes table themes_area_id aynı ve active_themes_id = 1 
		$this->db->select('themes_area.id,themes_area.class_name,themes.themes_area_id,themes.active_themes_id,themes.file_path,themes.create_time,themes.update_time');
		$this->db->from('themes_area');
		$this->db->where('class_name','banner');
		$this->db->join('themes', 'themes.themes_area_id = themes_area.id');
		$this->db->where('active_themes_id',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}*/

	function example() {
		$this->db->select('settings_value');
		$this->db->where('settings_name','site_logo');
		$db_site_logo = $this->db->get('site_settings');
		return $db_site_logo = $db_site_logo->result();
	}
}
?>