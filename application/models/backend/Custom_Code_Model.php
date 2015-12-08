<?php 
/**
* model - custom_code_model
*/
class Custom_Code_Model extends CI_Model
{
	
	function get_custom_code($custom_code_name = null) {

		if ($custom_code_name != null) {
			$this->db->where('custom_code_name', $custom_code_name);
		}
		$query = $this->db->get('custom_code');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function update_custom_code() {
		$this->load->helper('file');
		foreach ($this->input->post(null,false) as $key => $value) {
			$custom_code_update_data = array(
				'custom_code_value' => $value
			);
			$this->db->set($custom_code_update_data);
			$this->db->where('custom_code_name', $key);
			$this->db->update('custom_code');

			$file_path = explode("_", $key);
			if (file_exists(APPPATH.$file_path[0]."\\".$file_path[1])) {
				if ( ! write_file(APPPATH.$file_path[0]."\\".$file_path[1]."\\".$file_path[1].'.php', $value)) {
			        $this->session->set_flashdata('errors','dosyanız yazılmadı.');
				} else {
			        $custom_code_update_data = array(
						'file_path' => $file_path[0]."/".$file_path[1]."/".$file_path[1].'.php'
					);
					$this->db->set($custom_code_update_data);
					$this->db->where('custom_code_name', $key);
					$this->db->update('custom_code');
				}
			}
		}
	}
}
?>