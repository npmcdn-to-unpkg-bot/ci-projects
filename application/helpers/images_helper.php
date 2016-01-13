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
  $image_max_size_result=image_max_size($images_name);
  echo $image_max_size_result;    
  2. 
  $this->load->helper('images_helper');
  $image_max_size_result=image_max_size($images_name,2048576);
  echo $image_max_size_result;  
  1.
  $this->load->helper('images_helper');
  $image_ext_result=image_ext(images_name);
  echo $image_ext_result;    
  2. 
  $this->load->helper('images_helper');
  $image_ext_result=image_ext(images_name,'jpg|jpeg|png|gif|pdf');
  echo $image_ext_result;  
  1.
  $this->load->helper('images_helper');
  $image_upload_path_result=image_upload_path(images_name);
  echo $image_upload_path_result;    
  2. 
  $this->load->helper('images_helper');
  $image_upload_path_result=image_upload_path(images_name,'assets/uploads/system/images/');
  echo $image_upload_path_result;    
*/

if ( ! function_exists('image_max_size'))
{
    
  function image_max_size($image,$size = 1048576) {

    if ($_FILES[$image]['size'] > $size) {
      $this->form_validation->set_message('image_max_size', 'Kategori {field} hata, dosyanızın boyutu buyuktur.');
      return false;
    }
    return true;
  }
}
if ( ! function_exists('image_ext'))
{
  function image_ext($image,$extension = 'jpg|jpeg|png|gif') {

    $config = array(
      'is_allowed' => $extension
    );
    $image_is_allowed = explode("|", $config['is_allowed']);
    $image_ext = strtolower(pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION));
    if (!empty($_FILES[$image]['name'])) {
      if (!in_array($image_ext, $image_is_allowed)) {
        $this->form_validation->set_message('image_ext', 'Kategori {field} hata, sadece '.$extension.' uzantilara izin verilir.');
        return false;
      } 
    }
    return true;
  }
}
if ( ! function_exists('image_upload_path'))
{
  function image_upload_path($image,$uploads_path = 'assets/uploads/system/images/') {

    if (!file_exists(FCPATH.$uploads_path)) {
      $this->form_validation->set_message('image_upload_path', '{field} hata, klasör yolu: "'.FCPATH.$uploads_path'" yanlıştır.');
      return false;
    }
    return true;
  }
}
/* End of file images_helper.php */