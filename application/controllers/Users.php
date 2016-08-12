<?php 
/**
 * Users - frontend
 */
 class Users extends Frontend_Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->loginControl();
		// var_dump($this->session->all_userdata());
 	}

 	public function index() {
 		
 	}

 	public function myinfo() {
 		$this->load->model('frontend/themes_model');
		$this->load->model('frontend/site_settings_model');
		$this->load->model('frontend/users_model');
		// header - footer - myinfo -> file_path
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['myinfo'] = $this->themes_model->get_themes_class_name('myinfo');

		$get_users_ = $this->users_model->get_users();
		$data['get_users'] = $get_users_[0];
		$data['city'] = $this->city();
		$data['county'] = $this->county($data['get_users']->city_id);
		$data['district'] = $this->district($data['get_users']->county_id);
		$data['neighborhood'] = $this->neighborhood($data['get_users']->district_id);

		if ($this->input->post()) {
			// validation_form
	 		$this->load->library('form_validation');
			$this->form_validation->set_rules('username','','trim|required|min_length[3]');
			$this->form_validation->set_rules('email','','trim|required|valid_email');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('frontend/layout/head',$data);
				$this->load->view('frontend/layout/header',$data);
				$this->load->view('frontend/myinfo',$data);
				$this->load->view('frontend/layout/footer',$data);
				$this->load->view('frontend/layout/foot',$data);
			} else {
				$this->users_model->update_users();

				$this->session->set_flashdata('success','güncelleme yapildi.');
				redirect('users/myinfo');
			}
		} else {
			$this->load->view('frontend/layout/head',$data);
			$this->load->view('frontend/layout/header',$data);
			$this->load->view('frontend/myinfo',$data);
			$this->load->view('frontend/layout/footer',$data);
			$this->load->view('frontend/layout/foot',$data);
		}
 	}

 	public function changemypassword() {
		$this->load->model('frontend/themes_model');
		$this->load->model('frontend/site_settings_model');
		$this->load->model('frontend/users_model');
		// header - footer - myinfo -> file_path
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['myinfo'] = $this->themes_model->get_themes_class_name('myinfo');

		$get_users_ = $this->users_model->get_users();
		$data['get_users'] = $get_users_[0];
		$data['city'] = $this->city();
		$data['county'] = $this->county($data['get_users']->city_id);
		$data['district'] = $this->district($data['get_users']->county_id);
		$data['neighborhood'] = $this->neighborhood($data['get_users']->district_id);

		if ($this->input->post()) {
			// validation_form
	 		$this->load->library('form_validation');
			$this->form_validation->set_rules('old_password','Eski şifreniz','trim|required|matches[old_password_conf]|callback_check_old_password[Mevcut şifreniz]');
			$this->form_validation->set_rules('old_password_conf','Eski şifreniz(tekrar)','trim|required');
			$this->form_validation->set_rules('password','Şifreniz','trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('frontend/layout/head',$data);
				$this->load->view('frontend/layout/header',$data);
				$this->load->view('frontend/myinfo',$data);
				$this->load->view('frontend/layout/footer',$data);
				$this->load->view('frontend/layout/foot',$data);
			} else {
				$this->users_model->update_changemypassword();

				$this->session->set_flashdata('success','şifre degişikliğiniz yapildi.');
				redirect('users/changemypassword');
			}
		} else {
			$this->load->view('frontend/layout/head',$data);
			$this->load->view('frontend/layout/header',$data);
			$this->load->view('frontend/myinfo',$data);
			$this->load->view('frontend/layout/footer',$data);
			$this->load->view('frontend/layout/foot',$data);
		}
 	}

 	public function check_old_password($requested_pass) {
 		$this->load->model('frontend/users_model');
		$old_password = $this->users_model->check_old_password($requested_pass);
		$old_pass = $this->encryption->decrypt($old_password);

		if ($old_pass == $this->input->post('old_password')) {
			return TRUE;
		} else {
			return FALSE;
		}
 	}

 } 

 ?>