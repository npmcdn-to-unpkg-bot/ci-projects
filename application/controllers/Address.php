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
	
	public function country($id = null) {
		$country = $this->address_model->get_country($id);
		// var_dump($country);
		return $country;
	}
	public function city($id = null) {
		$city = $this->address_model->get_city($id);
		// var_dump($city);
		return $city;
	}
	public function county($id = null) {
		$county = $this->address_model->get_county($id);
		// var_dump($county);
		return $county;
	}
	public function district($id = null) {
		$district = $this->address_model->get_district($id);
		// var_dump($district);
		return $district;
	}
	public function neighborhood($id = null) {
		$neighborhood = $this->address_model->get_neighborhood($id);
		// var_dump($neighborhood);
		return $neighborhood;
	}
}