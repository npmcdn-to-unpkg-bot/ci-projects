<?php 
/**
* Files_Management_Model
*/
class Files_Management_Model extends CI_Model
{
	function get_dir_model($get_dir) {
		$this->load->helper('file');
		return get_dir_file_info($get_dir);
	}
}
?>