<?php 
/**
* backend - Site_Settings
*/
class Site_Settings extends Backend_Controller
{
	
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->load->model('site_settings_model');
		if ($this->input->post()) {

			$this->load->library('form_validation');
			// form validation
			$this->form_validation->set_rules('home_page_sidebar','','required');
			$this->form_validation->set_rules('category_page_sidebar','','required');
			$this->form_validation->set_rules('search_page_sidebar','','required');
			$this->form_validation->set_rules('brand_page_sidebar','','required');
			$this->form_validation->set_rules('product_page_sidebar','','required');
			$this->form_validation->set_rules('blog_page_sidebar','','required');
			var_dump($this->input->post());
			exit;
		} else {

			$this->load->view('backend/layout/header');
			$this->load->view('backend/site_settings');
			$this->load->view('backend/layout/footer');	
		}
		
	}
}
?>