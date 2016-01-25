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
			foreach ($_FILES as $key => $value) {
				$_POST[$key] = $key;
				$images[$key] = $value;
			}
			$data = $this->input->post();
			// form_validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','','trim|required');
			$this->form_validation->set_rules('list_image','','trim|callback_image_max_size|callback_image_ext');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/blog/blog_add',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->blog_model->blog_add($images);
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
			foreach ($_FILES as $key => $value) {
				$_POST[$key] = $key;
				$images[$key] = $value;
			}
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
				$this->blog_model->blog_update($images);
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

	public function blog_delete() {
		$this->load->model('backend/blog_model');
		$this->blog_model->blog_delete();
		$this->session->set_flashdata('errors','blog silindi.');
		redirect('backend/blog');
	}

	public function image_max_size($image) {
		
		if ($_FILES[$image]['size'] > 1048576) {
			$this->form_validation->set_message('image_max_size', 'Kategori {field} hata, dosyanızın boyutu buyuktur.');
			return false;
		}
		return true;
	}

	public function image_ext($image) {

		$config = array(
			'is_allowed' => 'jpg|jpeg|png|gif'
		);
		$image_is_allowed = explode("|", $config['is_allowed']);
		$image_ext = strtolower(pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION));
		if (!empty($_FILES[$image]['name'])) {
			if (!in_array($image_ext, $image_is_allowed)) {
				$this->form_validation->set_message('image_ext', 'Kategori {field} hata, sadece JPG, JPEG, PNG & GIF uzantilara izin verilir.');
				return false;
			}	
		}
		return true;
	}
}
?>