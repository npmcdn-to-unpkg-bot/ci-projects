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
		$this->load->model('backend/showcase_model');
		$data['showcase_list'] = $this->showcase_model->get_showcase();
		$this->load->view('backend/layout/header');
		$this->load->view('backend/showcase/showcase_management',$data);
		$this->load->view('backend/layout/footer');
	}

	public function showcase_add() {
		$this->load->model('backend/showcase_model');
		$this->load->model('backend/categories_model');
		$this->load->model('backend/blog_model');
		$this->load->model('backend/themes_model');
		$data['categories'] = $this->categories_model->get_categories();
		$data['blog'] = $this->blog_model->get_blog();
		$data['showcase_frame'] = $this->themes_model->get_themes_list(4);
		$data['showcase_views'] = $this->themes_model->get_themes_list(5);
		if ($this->input->post()) {
			foreach ($this->input->post() as $key => $value) {
				$data[$key] = $value;
			}
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
			$this->load->view('backend/showcase/showcase_add',$data);
			$this->load->view('backend/layout/footer');
		}
	}
}
?>