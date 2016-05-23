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
	
	public function json_country($id = null) {
		$country = $this->address_model->get_country($id);
		$this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($country, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	public function json_city($id = null) {
		$city = $this->address_model->get_city($id);
		$this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($city, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	public function json_county($id = null) {
		$county = $this->address_model->get_county($id);
		$this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($county, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	public function json_district($id = null) {
		$district = $this->address_model->get_district($id);
		$this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($district, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	public function json_neighborhood($id = null) {
		$neighborhood = $this->address_model->get_neighborhood($id);
		$this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($neighborhood, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
}