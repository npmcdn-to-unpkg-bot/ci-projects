<?php 
/**
* Themes_Model
*/
class Themes_Model extends CI_Model
{
	
	function get_themes_area() {

		$query = $this->db->get('themes_area');
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}

	function get_themes_area_where($id) {

		$this->db->where('id',$id);
		$query = $this->db->get('themes_area');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_themes_area_parent($parent_id = null) {
		
		if ($parent_id) {
			// echo "get_themes_area_parent = if";
			$this->db->where('parent_id',$parent_id);
			$query = $this->db->get('themes_area');
			if ($query->num_rows()>0) {

				return $result = $query->result();
			}
		} else {
			// echo "get_themes_area_parent = else";
			$this->db->where('parent_id',0);
			$query = $this->db->get('themes_area');
			if ($query->num_rows()>0) {

				return $result = $query->result();
			}
		}
	}

	function get_themes_list($themes_area_id) {
		$this->db->select('themes.*,themes_area.limited');
		$this->db->join('themes_area','themes.themes_area_id = themes_area.id');
		$this->db->where('themes_area_id',$themes_area_id);
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_themes($themes_id) {

		$this->db->where('id', $themes_id);
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function themes_add($content) {

		$this->load->helper('file');
		
		if ($this->input->post('default_themes_id') == null) {
			$default_themes_id = false;
		} else {
			$default_themes_id = true;
		}

		if ($this->input->post('active_themes_id') == null) {
			$active_themes_id = false;
		} else {
			$active_themes_id = true;
		}

		$new_themes_insert_data = array(
			'themes_area_id' => $this->input->post('themes_area_id'),
			'default_themes_id' => $default_themes_id,
			'active_themes_id' => $active_themes_id,
			'name' => $this->input->post('name'),
			'content' => $this->input->post('content', FALSE),
			'create_time' => date("Y-m-d H:i:s")
		);
		$insert = $this->db->set($new_themes_insert_data)->insert('themes');
		$last_themes_id = $this->db->insert_id();

		$themes_area_ = $this->get_themes_area_where($this->input->post('themes_area_id'));
		$this->db->set('file_path',$this->input->post('file_path') . $themes_area_[0]->file_extension . $last_themes_id .'.php');
		$this->db->where('id',$last_themes_id);
		$this->db->update('themes');

		if ( ! write_file(APPPATH . $this->input->post('file_path') . $themes_area_[0]->file_extension . $last_themes_id .'.php', $content)) {
	        $this->session->set_flashdata('errors','dosyanız yazılmadı.');
		} else {
	        // $this->session->set_flashdata('errors','dosyanız yazıldı.');
		}
	}

	function themes_edit($content) {

		$this->load->helper('file');

		if ($this->input->post('default_themes_id') == null) {
			$default_themes_id = false;
		} else {
			$default_themes_id = true;
		}

		if ($this->input->post('active_themes_id') == null) {
			$active_themes_id = false;
		} else {
			$active_themes_id = true;
		}

		$themes_update_data = array(
			'themes_area_id' => $this->input->post('themes_area_id'),
			'default_themes_id' => $default_themes_id,
			'active_themes_id' => $active_themes_id,
			'name' => $this->input->post('name'),
			'content' => $this->input->post('content', FALSE)
		);
		$this->db->set($themes_update_data);
		$this->db->where('id', $this->input->post('themes_id'));
		$this->db->update('themes');

		$this->db->set('file_path',$this->input->post('file_path'));
		$this->db->where('id',$this->input->post('themes_id'));
		$this->db->update('themes');

		if ( ! write_file(APPPATH . $this->input->post('file_path'), $content)) {
	        $this->session->set_flashdata('errors','dosyanız yazılmadı.');
		} else {
	        // $this->session->set_flashdata('errors','dosyanız yazıldı.');
		}
	}

	function themes_delete($themes_id) {

		$themes = $this->get_themes($themes_id);

		unlink(APPPATH.$themes[0]->file_path);
		$this->db->where('id',$themes[0]->id);
		$this->db->delete('themes');
		$this->session->set_flashdata('errors','temanız silindi.');
		redirect('backend/themes');
	}

	function active_themes_delete($themes_id) {

		$themes = $this->get_themes($themes_id);

		$this->db->set('active_themes_id',1);
		$this->db->where('default_themes_id',1);
		$this->db->where('themes_area_id',$themes[0]->themes_area_id);
		$this->db->update('themes');

		unlink(APPPATH.$themes[0]->file_path);
		$this->db->where('id',$themes[0]->id);
		$this->db->delete('themes');
		$this->session->set_flashdata('errors','​aktif temanızı sildiniz. varsayılan tema, aktif temanız olmuştur.');
		redirect('backend/themes');
	}

	function check_if_default_themes_id_exists() {

		$this->db->where('themes_area_id',$this->input->post('themes_area_id'));
		$this->db->where('default_themes_id',1);
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {

			$this->db->set('default_themes_id',0);
			$this->db->where('themes_area_id',$this->input->post('themes_area_id'));
			$this->db->update('themes');
		}
	}

	function check_if_active_themes_id_exists() {

		$this->db->where('themes_area_id',$this->input->post('themes_area_id'));
		$this->db->where('active_themes_id',1);
		$query = $this->db->get('themes');
		if ($query->num_rows()>0) {

			$this->db->set('active_themes_id',0);
			$this->db->where('themes_area_id',$this->input->post('themes_area_id'));
			$this->db->update('themes');
		}
	}
}
?>