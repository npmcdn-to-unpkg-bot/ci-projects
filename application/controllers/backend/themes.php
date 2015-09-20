<?php 
/**
* backend - themes
*/
class Themes extends Backend_Controller
{

	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->themes_management();
	}

	public function themes_management() {
		echo "themes_management";
	}
}
?>