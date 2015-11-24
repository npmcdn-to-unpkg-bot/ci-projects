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

			$site_settings_model = $this->site_settings_model->get_site_settings();
			
			foreach ($site_settings_model as $key => $value) {
				echo $value->settings_name."<br>";
			}
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