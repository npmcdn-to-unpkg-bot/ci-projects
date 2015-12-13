<?php 
/**
* showcase - backend
*/
class Showcase extends Backend_Controller
{
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}
	
	public function index() {
		
		$this->load->view('backend/layout/header');
		$this->load->view('backend/showcase/showcase_management');
		$this->load->view('backend/layout/footer');
	}

	public function showcase_add() {
		$this->load->model('backend/showcase_model');
		if ($this->input->post()) {
			$data = $this->input->post();
			// form_validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/showcase/showcase_add',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->showcase_model->showcase_add();
				$this->session->set_flashdata('success','vitrin eklendi.');
				redirect('backend/showcase');
			}
		} else {
			$this->load->view('backend/layout/header');
			$this->load->view('backend/showcase/showcase_add');
			$this->load->view('backend/layout/footer');
		}
	}
}
?>