<?php
/**
* sidebar - backend
*/
class Sidebar extends Backend_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->load->model('backend/sidebar_model');
		$data['sidebar'] = $this->sidebar_model->get_sidebar();
		// echo"<pre>";var_dump($data);exit;
		$this->load->view('backend/layout/header');
		$this->load->view('backend/sidebar/sidebar_management',$data);
		$this->load->view('backend/layout/footer');
	}

	public function sidebar_add() {
		$this->load->model('backend/sidebar_model');
		$this->load->model('backend/themes_model');
		$data['sidebar_frame'] = $this->themes_model->get_themes_list(10);
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
			$this->load->view('backend/sidebar/sidebar_add',$data);
			$this->load->view('backend/layout/footer');
		}
	}

	public function sidebar_update($id) {
		$this->load->model('backend/sidebar_model');
		$this->load->model('backend/themes_model');
		$data['sidebar_frame'] = $this->themes_model->get_themes_list(10);
		if ($this->input->post()) {
			$data = $this->input->post();
			// form validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			$this->form_validation->set_rules('which_side','','required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/sidebar/sidebar_update',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->sidebar_model->sidebar_update();
				$this->session->set_flashdata('success','bileşen guncellendi.');
				redirect('backend/sidebar/sidebar_update/'.$id);
			}
		} else {
			$sidebar = $this->sidebar_model->get_sidebar($id);
			foreach ($sidebar[0] as $key => $value) {
				$data[$key] = $value;
			}
			$this->load->view('backend/layout/header');
			$this->load->view('backend/sidebar/sidebar_update',$data);
			$this->load->view('backend/layout/footer');
		}
	}

	public function sidebar_delete() {
		$this->load->model('backend/sidebar_model');
		$this->sidebar_model->sidebar_delete();
		$this->session->set_flashdata('errors','bileşen silindi.');
		redirect('backend/sidebar');
	}

	public function sidebar_move() {
		$this->load->model('backend/sidebar_model');
		$this->sidebar_model->sidebar_move();
	}
}
?>