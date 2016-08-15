<?php 
/**
* Email - frontend
*/
class Email extends Frontend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function blog_notification_mailling() {

		$this->load->library('email');

		$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_user'] = 'huseyindol@gmail.com';
        $config['smtp_pass'] = '365Huseyin';
        $config['smtp_port'] = '465';
        $this->email->initialize($config);

        $this->email->from('huseyindol@gmail.com', 'Hüseyin DOL');
        $this->email->to('huseyindol@hotmail.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

		if ($this->email->send()){
			echo 'Your e-mail has been sent';
		}
		else{
			show_error($this->email->print_debugger());
		}
	}

	public function register_mailling() {

	}
}
?>