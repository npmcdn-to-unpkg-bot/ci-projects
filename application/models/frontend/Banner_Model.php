<?php 
/**
* fontend - Banner_Model
*/
class Banner_Model extends CI_Model
{
	function get_banner($banner_type = null,$target = null) {
		if ($target != null) {
			$this->db->where('target', $target);
		}
		if ($banner_type != null) {
			$this->db->where('banner_type', $banner_type);
		}
		$query = $this->db->get('banner');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}
?>