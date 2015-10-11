<?php  
/**
* Themes_Variables_Model
*/
class Themes_Variables_Model extends CI_Model
{
	
	function header() {

		return $themes_variables = array(
			'logo' => '<img src="assets/uploads/images/logo.png" />',
			'favicon' => '<img src="assets/uploads/images/favicon.co" />'
		);
	}

	function footer() {

		return $themes_variables = array(
			'footer logo' => '<img src="assets/uploads/images/logo.png" />'
		);
	}
}
?>