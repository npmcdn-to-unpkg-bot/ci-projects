<?php 
/**
* comments - backend
*/
class Comments extends Backend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->loginControl();
	}

	public function index() {

	}

	public function blog_comments() {
		$data = '';

		$this->load->view('backend/layout/header');
		$this->load->view('backend/comments/blog_comments',$data);
		$this->load->view('backend/layout/footer');
	}

	public function blog_comments_add() {
		if ($this->input->post('name')) {
			echo "merhaba ".$this->input->post('name');
		} else {
			echo "isim gelmedi";
		}

	}

}
?>