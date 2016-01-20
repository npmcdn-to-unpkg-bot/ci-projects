<?php 
/**
* Sidebar_Model
*/
class Sidebar_Model extends CI_Model
{

	function get_sidebar($sidebar_id = null) {
		if ($sidebar_id != null) {
			$this->db->where('id', $sidebar_id);
		}
		$this->db->order_by('queue', 'ASC');
		$query = $this->db->get('sidebar');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function sidebar_add() {
		if ($this->input->post('status')) {
			$status = 1;
		} else {
			$status = 0;
		}
		$new_sidebar_insert_data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'status' => $status,
			'which_side' => $this->input->post('which_side'),
			'queue' => 0,
			'themes_id' => $this->input->post('themes_id'),
			'create_time' => date("Y-m-d H:i:s")
		);
		$this->db->set($new_sidebar_insert_data)->insert('sidebar');
	}

	function sidebar_update() {
		if ($this->input->post('status')) {
			$status = 1;
		} else {
			$status = 0;
		}
		$sidebar_update_data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'status' => $status,
			'themes_id' => $this->input->post('themes_id'),
			'which_side' => $this->input->post('which_side')
		);
		$this->db->set($sidebar_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('sidebar');
	}

	function sidebar_delete() {
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('sidebar');
	}

	function sidebar_move() {
		$sidebar_move_update_data = array(
			'queue' => $this->input->post('queue'),
			'which_side' => $this->input->post('which_side'),
		);
		$this->db->set($sidebar_move_update_data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('sidebar');
	}
}
?>