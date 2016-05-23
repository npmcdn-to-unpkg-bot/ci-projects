<?php 
/**
* MY_Controller
*/
class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function country($id = null) {
		$this->load->model('address_model');
		$country = $this->address_model->get_country($id);
		// var_dump($country);
		return $country;
	}
	public function city($id = null) {
		$this->load->model('address_model');
		$city = $this->address_model->get_city($id);
		// var_dump($city);
		return $city;
	}
	public function county($id = null) {
		$this->load->model('address_model');
		$county = $this->address_model->get_county($id);
		// var_dump($county);
		return $county;
	}
	public function district($id = null) {
		$this->load->model('address_model');
		$district = $this->address_model->get_district($id);
		// var_dump($district);
		return $district;
	}
	public function neighborhood($id = null) {
		$this->load->model('address_model');
		$neighborhood = $this->address_model->get_neighborhood($id);
		// var_dump($neighborhood);
		return $neighborhood;
	}

}
/**
* Frontend_Controller
*/
class Frontend_Controller extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function loginControl() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('auth'));
		}
	}
	public function isLoggedIn() {
		if ($this->session->userdata('is_logged_in')) {
			redirect('home');
		}
	}
}
/**
* Backend_Controller
*/
class Backend_Controller extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function loginControl() {
		if (!$this->session->userdata('backend_is_logged_in')) {
			redirect(base_url('/backend/auth'));
		}
	}
	public function isLoggedIn() {
		if ($this->session->userdata('backend_is_logged_in')) {
			redirect('backend/home');
		}
	}
}

?>