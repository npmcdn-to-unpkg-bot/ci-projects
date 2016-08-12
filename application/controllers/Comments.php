<?php 
/**
* comments - frontend
*/
class Comments extends Frontend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {

	}

	public function blog_comments_add() {
		// validation_form
 		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','','trim|required');
		$this->form_validation->set_rules('content','','trim|required');
		$this->form_validation->set_rules('email','','trim|required|valid_email');
		if ($this->form_validation->run() === FALSE) {
			echo '<div class="errors">zorunlu alanları doldurun.</div>';
		} else {
			$this->load->model('frontend/comments_model');
			$this->comments_model->blog_comments_add();
			echo '<div class="success">işlem yapiliyor.</div>';
		}
	}

}
?>