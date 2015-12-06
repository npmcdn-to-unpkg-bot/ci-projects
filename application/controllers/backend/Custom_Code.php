<?php 
/**
* backend - Custom_Code
*/
class Custom_Code extends Backend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->load->model('backend/custom_code_model');
		if ($this->input->post()) {
			$this->custom_code_model->update_custom_code();
			redirect('backend/custom_code');
		} else {
			$custom_code = $this->custom_code_model->get_custom_code();
			$data = array();
			foreach ($custom_code as $key => $value) {
				$data[$value->custom_code_name] = $value->custom_code_value;
			}
			$this->load->view('backend/layout/header');
			$this->load->view('backend/custom_code',$data);
			$this->load->view('backend/layout/footer');
		}
	}
}
?>