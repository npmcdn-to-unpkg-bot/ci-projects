<?php 
/**
* blog - backend
*/
class Blog extends Backend_Controller
{

	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}
	
	public function index() {
		$this->load->model('backend/blog_model');
		$data['data'] = $this->blog_model->get_blog();
		// var_dump($data);exit;
		$this->load->view('backend/layout/header');
		$this->load->view('backend/blog/blog_management',$data);
		$this->load->view('backend/layout/footer');
	}

	public function blog_add() {
		$this->load->model('backend/blog_model');
		if ($this->input->post()) {
			$data = $this->input->post();
			// form_validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/blog/blog_add',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->blog_model->blog_add();
				$this->session->set_flashdata('success','blog eklendi.');
				redirect('backend/blog');
			}
		} else {
			$this->load->view('backend/layout/header');
			$this->load->view('backend/blog/blog_add');
			$this->load->view('backend/layout/footer');
		}
	}

	public function blog_update($id) {
		$this->load->model('backend/blog_model');
		if ($this->input->post()) {
			$data = $this->input->post();
			// form_validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			if ($this->form_validation->run() === FALSE) {
				$data['data'] = $this->blog_model->get_blog($id);
				$this->load->view('backend/layout/header');
				$this->load->view('backend/blog/blog_update',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->blog_model->blog_update();
				$this->session->set_flashdata('success','blog guncellendi.');
				redirect('backend/blog/blog_update/'.$id);
			}
		} else {
			$data['data'] = $this->blog_model->get_blog($id);
			$this->load->view('backend/layout/header');
			$this->load->view('backend/blog/blog_update',$data);
			$this->load->view('backend/layout/footer');
		}
	}

	public function blog_delete($id) {
		$this->load->model('backend/blog_model');
		$this->blog_model->blog_delete($id);
		$this->session->set_flashdata('errors','blog silindi.');
		redirect('backend/blog');
	}
}
?>