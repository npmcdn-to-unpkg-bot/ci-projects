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
		$this->load->model('backend/categories_model');
		$get_showcase = $this->showcase_model->get_showcase();
		foreach ($get_showcase as $key => $value) {
			$get_showcase_to_categories = $this->showcase_model->get_showcase_to_categories($value->id);
			$data['showcase_list'][$key] = $value;
			$data['showcase_list'][$key]->showcase_to_categories = $get_showcase_to_categories;
			
		}
		$showcase_to_categories = $this->showcase_model->get_showcase_to_categories();
		foreach ($showcase_to_categories as $key => $value) {
			$data['showcase_to_categories'][$value->categories_id] = $this->categories_model->get_categories($value->categories_id);
			$data['showcase_to_categories'][$value->categories_id] = $data['showcase_to_categories'][$value->categories_id][0];
		}
		// echo "<pre>";var_dump($data);exit;
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

	public function showcase_update($id) {
		$this->load->model('backend/showcase_model');
		$this->load->model('backend/categories_model');
		$this->load->model('backend/blog_model');
		$this->load->model('backend/themes_model');
		$data['categories'] = $this->categories_model->get_categories();
		$data['blog'] = $this->blog_model->get_blog();
		$data['showcase_frame'] = $this->themes_model->get_themes_list(4);
		if ($this->input->post()) {
			foreach ($this->input->post() as $key => $value) {
				$data[$key] = $value;
			}
			// form_validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/showcase/showcase_update',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->showcase_model->showcase_update();
				$this->session->set_flashdata('success','vitrin guncellendi.');
				redirect('backend/showcase/showcase_update/'.$id);
			}
		} else {
			$get_showcase_ = $this->showcase_model->get_showcase($id);
			$get_showcase_to_categories_ = $this->showcase_model->get_showcase_to_categories($id);
			$get_showcase_to_blog_ = $this->showcase_model->get_showcase_to_blog($id);
			if (isset($get_showcase_to_categories_)) {
				foreach ($get_showcase_to_categories_ as $key => $value) {
					$data['showcase_to_categories'][$key] = $value->categories_id;
				}
			}
			if (isset($get_showcase_to_blog_)) {
				foreach ($get_showcase_to_blog_ as $key => $value) {
					$data['showcase_to_blog'][$key] = $value->blog_id;
				}
			}
			if (isset($get_showcase_[0])) {
				foreach ($get_showcase_[0] as $key => $value) {
					$data[$key] = $value;
				}
			}
			$this->load->view('backend/layout/header');
			$this->load->view('backend/showcase/showcase_update',$data);
			$this->load->view('backend/layout/footer');
		}
	}

	public function showcase_delete() {
		$this->load->model('backend/showcase_model');
		$this->showcase_model->showcase_delete();
		$this->session->set_flashdata('errors','vitrin silindi.');
		redirect('backend/showcase');
	}

	public function blog_to_showcase($id) {
		$data['id'] = $id;
		$this->load->model('backend/blog_model');
		$this->load->model('backend/showcase_model');
		$this->load->model('backend/themes_model');
		$data['blog'] = $this->blog_model->get_blog();
		$data['blog_showcase_views'] = $this->themes_model->get_themes_list(8);
		$get_blog_to_showcase = $this->showcase_model->get_blog_to_showcase($id);
		// var_dump($data);
		if (isset($get_blog_to_showcase)) {
			foreach ($get_blog_to_showcase as $key => $value) {
				$data['blog_to_showcase'][$key] = $value->blog_id;
				$data['themes_id'] = $value->themes_id;
			}
		}
		if ($this->input->post()) {
			$this->showcase_model->blog_to_showcase_add();
			$this->session->set_flashdata('success','kaydedildi.');
			redirect('backend/showcase/blog_to_showcase/'.$id);
		}
		$this->load->view('backend/layout/header');
		$this->load->view('backend/showcase/blog_to_showcase',$data);
		$this->load->view('backend/layout/footer');
	}

	public function showcase_move() {
		$this->load->model('backend/showcase_model');
		$this->showcase_model->showcase_move();
	}
}
?>