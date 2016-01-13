<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------
/**
 * Random String Generator : Helper File for Codeigniter 
 * 
 * @author      Hüseyin DOL
 * @link        
 * 
 */
// ------------------------------------------------------------------------
/*
 Documentation:
 =============
  1.
  $this->load->helper('images_helper');
  $file_max_size_result=file_max_size($images_name);
  echo $file_max_size_result;    
  2. 
  $this->load->helper('images_helper');
  $file_max_size_result=file_max_size($images_name,2048576);
  echo $file_max_size_result;  
  1.
  $this->load->helper('images_helper');
  $file_ext_result=file_ext(images_name);
  echo $file_ext_result;    
  2. 
  $this->load->helper('images_helper');
  $file_ext_result=file_ext(images_name,'jpg|jpeg|png|gif|pdf');
  echo $file_ext_result;
*/

if ( ! function_exists('file_max_size'))
{
    
  function file_max_size($image,$size = 1048576) {

    if ($_FILES[$image]['size'] > $size) {
      return false;
    }
    return true;
  }
}
if ( ! function_exists('file_ext'))
{
  function file_ext($image,$extension = 'jpg|jpeg|png|gif') {

    $config = array(
      'is_allowed' => $extension
    );
    $image_is_allowed = explode("|", $config['is_allowed']);
    $file_ext = strtolower(pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION));
    if (!empty($_FILES[$image]['name'])) {
      if (!in_array($file_ext, $image_is_allowed)) {
        return false;
      } 
    }
    return true;
  }
}
/* End of file images_helper.php */