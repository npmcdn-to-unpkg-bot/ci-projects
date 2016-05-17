<?php 
/**
* Address_Model
*/
class Address_Model extends CI_Model
{
	function get_country($id = null) {
		if ($id != null) {
			$this->db->where('country_id', $id);
		}
		$this->db->order_by('country_name', 'ASC');
		$query = $this->db->get('country');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	function get_city($id = null) {
		if ($id != null) {
			$this->db->where('city_id', $id);
		}
		$this->db->order_by('city_name', 'ASC');
		$query = $this->db->get('city');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	function get_county($id = null) {
		if ($id != null) {
			$this->db->where('county_id', $id);
		}
		$this->db->order_by('county_name', 'ASC');
		$query = $this->db->get('county');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	function get_district($id = null) {
		if ($id != null) {
			$this->db->where('district_id', $id);
		}
		$this->db->order_by('district_name', 'ASC');
		$query = $this->db->get('district');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
	function get_neighborhood($id = null) {
		if ($id != null) {
			$this->db->where('neighborhood_id', $id);
		}
		$this->db->order_by('neighborhood_name', 'ASC');
		$query = $this->db->get('neighborhood');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}