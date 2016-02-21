<?php 
/**
 * auth-frontend
 */
 class auth extends Frontend_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index() {
 		$this->isLoggedIn();
 		$this->login();
 	}

 	public function login() {
 		$this->isLoggedIn();
 		$this->load->library('form_validation');
 		$this->load->model('frontend/themes_model');
 		// header - footer - login
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['login'] = $this->themes_model->get_themes_class_name('login');
		if ($this->input->post()) {
			// validation_form
	 		$this->load->library('form_validation');
			$this->form_validation->set_rules('username','','trim|required|min_length[4]');
			$this->form_validation->set_rules('password','','trim|required|min_length[4]|max_length[32]');
			if ($this->form_validation->run() === FALSE) {
				$data['username'] = $this->input->input_stream('username');
				$this->load->view('frontend/layout/header',$data);
				$this->load->view('frontend/auth/login',$data);
				$this->load->view('frontend/layout/footer',$data);
			} else {
				$this->load->model('frontend/users_model');
				$query = $this->users_model->validate();
				if ($query) { // if the user's credentials valiated...
					$get_users_ = $this->users_model->get_users();
					$get_users_vendor = (isset($get_users_->vendor))? true : false ;
					$get_users_customer = (isset($get_users_->customer))? true : false ;
					$data = array(
						'frontend_username' => $this->input->post('username'),
						'frontend_is_logged_in'	=>  true,
						'frontend_vendor' => $get_users_vendor,
						'frontend_customer' => $get_users_customer
					);
					$this->session->set_userdata($data);
					$this->session->unset_userdata('frontend_login_attempt');
					redirect('home');
				} else {
					if ($this->session->userdata('frontend_login_attempt')>0) {
					$login_attempt = $this->session->userdata('frontend_login_attempt');
					$login_attempt++;
					$userdata_session = array(
						'frontend_login_attempt' => $login_attempt
					);	
					} else {
						$userdata_session = array(
							'frontend_login_attempt' => 1
						);
					}
					$this->session->set_userdata($userdata_session);
					var_dump($this->session->all_userdata());
					$data['errors'] = 'Kullanıcı Adı veya Şifreniz yanlıştır.';
					$this->load->view('frontend/layout/header',$data);
					$this->load->view('frontend/auth/login',$data);
					$this->load->view('frontend/layout/footer',$data);
				}
			}
		} else {
			$this->load->view('frontend/layout/header',$data);
			$this->load->view('frontend/auth/login',$data);
			$this->load->view('frontend/layout/footer',$data);
		}
		
 	}

 	public function logout() {
		$this->session->unset_userdata('frontend_username');
		$this->session->unset_userdata('frontend_is_logged_in');
		$this->session->unset_userdata('frontend_vendor');
		$this->session->unset_userdata('frontend_customer');
		redirect('auth');
	}
 } 

 ?>