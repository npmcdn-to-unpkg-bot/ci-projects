<?php 
/**
 * Auth - frontend
 */
 class Auth extends Frontend_Controller
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
				$g_recaptcha_secret = "6LcjwRgTAAAAAPZGsRUiWu13NSga9zED7aY-fxsC";
				$g_recaptcha_url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$g_recaptcha_secret."&response=".$this->input->post('g-recaptcha-response')."&remoteip=".$this->input->ip_address());
				$g_recaptcha = json_decode($g_recaptcha_url,TRUE);
				if ($this->input->post('g-recaptcha-response') === NULL || $g_recaptcha['success']) {
					// recaptcha dogru
					$query = $this->users_model->validate();
					if ($query) { // if the user's credentials valiated...
						$get_users_ = $this->users_model->get_users();
						$get_users_vendor = (isset($get_users_->vendor))? true : false ;
						$get_users_customer = (isset($get_users_->customer))? true : false ;
						$data = array(
							'username' => $this->input->post('username'),
							'is_logged_in'	=>  true,
							'vendor' => $get_users_vendor,
							'customer' => $get_users_customer
						);
						$this->session->set_userdata($data);
						$this->session->unset_userdata('frontend_login_attempt');
						redirect('home');
					} else {
						$frontend_login_attempt = $this->session->userdata('frontend_login_attempt');
						$frontend_login_attempt++;
						$userdata_session = array(
							'frontend_login_attempt' => $frontend_login_attempt
						);
						$this->session->set_userdata($userdata_session);
						$data['errors'] = 'Kullanıcı Adı veya Şifreniz yanlıştır.';
						$this->load->view('frontend/layout/header',$data);
						$this->load->view('frontend/auth/login',$data);
						$this->load->view('frontend/layout/footer',$data);
					}
				} else {
					// recaptcha yanlis
					$frontend_login_attempt = $this->session->userdata('frontend_login_attempt');
					$frontend_login_attempt++;
					$userdata_session = array(
						'frontend_login_attempt' => $frontend_login_attempt
					);
					$this->session->set_userdata($userdata_session);
					$data['errors'] = 'recaptcha işaretlemelisiniz.';
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

 	public function register() {
 		$this->isLoggedIn();
 		$this->load->library('form_validation');
 		$this->load->model('frontend/themes_model');
 		// header - footer - login
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['register'] = $this->themes_model->get_themes_class_name('register');
		$data['city'] = $this->city();
		if ($this->input->post()) {
			$g_recaptcha_secret = "6LcjwRgTAAAAAPZGsRUiWu13NSga9zED7aY-fxsC";
			$g_recaptcha_url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$g_recaptcha_secret."&response=".$this->input->post('g-recaptcha-response')."&remoteip=".$this->input->ip_address());
			$g_recaptcha = json_decode($g_recaptcha_url,TRUE);
			if ($this->input->post('g-recaptcha-response') === NULL || $g_recaptcha['success']) {
				// validation_form
				$this->form_validation->set_rules('username','','trim|required|min_length[3]|callback_check_if_username_exists');
				$this->form_validation->set_rules('email','','trim|required|valid_email|callback_check_if_email_exists');
				$this->form_validation->set_rules('password','','trim|required|min_length[4]|max_length[32]');
				$this->form_validation->set_rules('password_repeat','','trim|required|min_length[4]|max_length[32]|matches[password]');
				if ($this->form_validation->run() === FALSE) {
					$data['username'] = $this->input->input_stream('username');
					$data['email'] = $this->input->input_stream('email');
					$data['name'] = $this->input->input_stream('name');
					$data['surname'] = $this->input->input_stream('surname');
					$this->load->view('frontend/layout/header',$data);
					$this->load->view('frontend/auth/register',$data);
					$this->load->view('frontend/layout/footer',$data);
				} else {
                    $this->load->model('frontend/users_model');
                    $this->users_model->add_users();
                    
                    $this->session->set_flashdata('success','<!-- Button trigger modal --><button type="button" class="btn btn-primary btn-lg uyelik-tamam" data-toggle="modal" data-target="#myModal" style="display:none;">Üyelik Tamamlandı</button><!-- Modal --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Üyelik İşlemi</h4></div><div class="modal-body">üye kayıt işlemi başarılı bir şekilde yapıldı.</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button><a href="myinfo" class="btn btn-primary">Hesabım</a></div></div></div></div><script>$(".uyelik-tamam").click();</script>');
					redirect('home');
				}	
			} else {
				$data['errors'] = 'recaptcha işaretlemelisiniz.';
				$this->load->view('frontend/layout/header',$data);
				$this->load->view('frontend/auth/register',$data);
				$this->load->view('frontend/layout/footer',$data);
			}
		} else {
            $this->load->view('frontend/layout/header',$data);
            $this->load->view('frontend/auth/register',$data);
            $this->load->view('frontend/layout/footer',$data);
        }
 	}

 	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('vendor');
		$this->session->unset_userdata('customer');
		redirect('auth');
	}

	public function check_if_username_exists($requested_username) { // custom callback function
		$this->load->model('frontend/users_model');
		$username_available = $this->users_model->check_if_username_exists($requested_username);
		if ($username_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_if_email_exists($requested_email) { // custom callback function
		$this->load->model('frontend/users_model');
		$email_available = $this->users_model->check_if_email_exists($requested_email);
		if ($email_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
 } 

 ?>