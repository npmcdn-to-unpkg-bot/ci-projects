<?php 
/**
* MY_Controller
*/
class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
}
/**
* Frontend_Controller
*/
class Frontend_Controller extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function loginControl() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('auth'));
		}
	}
	public function isLoggedIn() {
		if ($this->session->userdata('is_logged_in')) {
			redirect('home');
		}
	}
}
/**
* Backend_Controller
*/
class Backend_Controller extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function loginControl() {
		if (!$this->session->userdata('backend_is_logged_in')) {
			redirect(base_url('/backend/auth'));
		}
	}
	public function isLoggedIn() {
		if ($this->session->userdata('backend_is_logged_in')) {
			redirect('backend/home');
		}
	}
}

?>