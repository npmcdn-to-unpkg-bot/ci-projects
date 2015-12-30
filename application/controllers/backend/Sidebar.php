<?php
/**
* sidebar_components - backend
*/
class Sidebar extends Backend_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->load->view('backend/layout/header');
		$this->load->view('backend/sidebar/sidebar_management');
		$this->load->view('backend/layout/footer');
	}

	public function sidebar_add() {
		$this->load->model('backend/sidebar_model');
		if ($this->input->post()) {
			$data = $this->input->post();
			// form validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			$this->form_validation->set_rules('which_side','','required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/sidebar/sidebar_add',$data);
				$this->load->view('backend/layout/footer');	
			} else {
				$this->sidebar_model->sidebar_add();
				$this->session->set_flashdata('success','bileşen eklendi.');
				redirect('backend/sidebar');
			}
		} else {
			$this->load->view('backend/layout/header');
			$this->load->view('backend/sidebar/sidebar_add');
			$this->load->view('backend/layout/footer');
		}
	}
}
?>