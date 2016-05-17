<?php 
/**
* Address - frontend
*/
class Address extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('address_model');
	}
	
	public function country() {
		return $country = $this->address_model->get_country();
	}
	public function city() {
		return $city = $this->address_model->get_city();
	}
	public function county() {
		return $county = $this->address_model->get_county();
	}
	public function district() {
		return $district = $this->address_model->get_district();
	}
	public function neighborhood() {
		return $neighborhood = $this->address_model->get_neighborhood();
	}
}