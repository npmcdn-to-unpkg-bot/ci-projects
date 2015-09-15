<?php 
/**
* auth-backend
*/
class Auth extends Backend_Controller
{

	public function index() {
		$this->login();
	}

	public function login() {
		$this->isLoggedIn();
		$data['title'] = "backend auth login";

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/auth/login');
		$this->load->view('backend/layout/footer');
	}

	public function validate_credentials() {

		$this->load->model('users_model');
		$query = $this->users_model->validate();

		if ($query) { // if the user's credentials valiated...

			$data = array(
				'username' 		=> $this->input->post('username'),
				'is_logged_in'	=>  true
			);
			$this->session->set_userdata($data);
			redirect('backend/home');
		} else {

			$this->index();
		}
	}

	public function register() {
		$this->isLoggedIn();
		$data['title'] = "backend auth register";

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/auth/register');
		$this->load->view('backend/layout/footer');
	}

	public function create_member() {

		$this->load->library('form_validation');

		// validation rules
		$this->form_validation->set_rules('name','trim|required');
		$this->form_validation->set_rules('surname','trim|required');
		$this->form_validation->set_rules('email','trim|required|valid_email|callback_check_if_email_exists');
		$this->form_validation->set_rules('username','trim|required|min-length[4]|callback_check_if_username_exists');
		$this->form_validation->set_rules('password','trim|required|min-length[4]|max-length[32]');
		$this->form_validation->set_rules('password_confirm','trim|required|matches[password]');

		if ($this->form_validation->run() === FALSE) { // dogrulama başarısız oldu
			echo "create_member run false";
			$this->load->view('backend/layout/header');
			$this->load->view('backend/auth/register');
			$this->load->view('backend/layout/footer');
		} else {
			echo "create_member run true";
			$this->load->model('users_model');

			if ($query = $this->users_model->create_member()) {
				
				$data['account_created'] = 'Hesabınız olusturuldu. giriş yapabilirsiniz.';

				$this->load->view('backend/layout/header');
				$this->load->view('backend/auth/login',$data);
				$this->load->view('backend/layout/footer');
			} else {

				$this->load->view('backend/layout/header');
				$this->load->view('backend/auth/register');
				$this->load->view('backend/layout/footer');
			}
		}
	}

	public function check_if_username_exists($requested_username) { // custom callback function
		$this->load->model('users_model');

		$username_available = $this->users_model->check_if_username_exists($requested_username);

		if ($username_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_if_email_exists($requested_email) { // custom callback function
		$this->load->model('users_model');

		$email_available = $this->users_model->check_if_email_exists($requested_email);

		if ($email_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}
} 

?>