<?php 
/**
* backend - user
*/
class User extends Backend_Controller
{
	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->profile();
	}
	
	public function profile() {

		$this->load->model('users_model');

		$user_row = $this->users_model->user_info($this->session->userdata('username'));
		
		foreach ($user_row as $key => $value) {
			$data[$key]= $value;
		}
		
		$this->load->view('backend/layout/header');
		$this->load->view('backend/user/profile',$data);
		$this->load->view('backend/layout/footer');
	}

	public function profile_edit() {

		$this->load->library('form_validation');

		// validation rules
		$this->form_validation->set_rules('email','','trim|required|valid_email');
		$this->form_validation->set_rules('name','','trim|required');
		$this->form_validation->set_rules('surname','','trim|required');
		$this->form_validation->set_rules('gsm','','trim|required|numeric');
		$this->form_validation->set_rules('phone','Telefon','trim|required|numeric');
		$this->form_validation->set_rules('phone2','Telefon2','trim|required|numeric');
		$this->form_validation->set_rules('address','','trim|required');

		if ($this->form_validation->run() === FALSE) {
			
			$this->profile();
		} else {

			$this->load->model('users_model');

			$query = $this->users_model->update_member();
			if ($query === TRUE) {
			
				$this->session->set_flashdata('success','güncellemeniz başarılı oldu.');
				redirect('backend/user');
			} else if ($query === 'email_available') {

				$this->session->set_flashdata('errors','Girdiginiz email kullanılmaktadır.');
				redirect('backend/user');
			} else {

				$this->session->set_flashdata('errors','lütfen bilgilerinizi kontrol edin.');
				redirect('backend/user');
			}
		}
		
	}

}