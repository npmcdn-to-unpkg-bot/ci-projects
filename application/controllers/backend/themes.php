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
		
		$this->load->model('themes_model');
		$data['themes'] = $themes = $this->themes_model->get_themes_area_parent();

		$this->load->view('backend/layout/header');
		$this->load->view('backend/themes/themes_management',$data);
		$this->load->view('backend/layout/footer');
	}

	public function check_if_parent_themes_exists() {

		$parent_id = $this->input->post('parent_id');
		$this->load->model('themes_model');
		$themes = $this->themes_model->get_themes_area_parent($parent_id);

		if ($themes) {

			$this->parent_themes_exists($themes);
		} else {

			$themes = $this->themes_model->get_themes($parent_id);
			if ($themes) {

				$this->themes_exists($themes);
			} else {

				$themes = $this->themes_model->get_themes_area_where($parent_id);
				$this->themes_exists($themes);
			}
		}
	}

	public function parent_themes_exists($themes) {
		
		$str = '<div class="form-group">
		<label>Tema Alanındaki Yerini Seçiniz</label>
		<select name="theme" id="parent_themes_area_id" class="form-control">
		<option value="0">Seçiniz</option>';
		foreach ($themes as $key => $value) {
			$str .= '<option value="'. $value->id .'">'. $value->name .'</option>';
		}
		$str .= '</select></div>';
		$str .= '<script>
					$(function(){
						$(\'#parent_themes_area_id\').on(\'change\',function(){
							$(\'#resultThemes\').html("");
							if ( $(this).val() == 0 ) {
								
								return false;
							}
							$.ajax({
								url:"backend/themes/check_if_parent_themes_exists",
								method:"post",
								data:\'parent_id=\'+$(this).val(),
								success:function(result) {
									$(\'#resultThemes\').html(result);
								}
							});
						});
					});
				</script>';

		echo $str;
	}

	public function themes_exists($themes) {

		if (isset($themes[0]->themes_area_id)) {
			
			$str = '<div class="form-group">			
			<label>Temanızı Seçiniz</label>
			<select name="themes_id" id="themes_id" class="form-control">
			<option value="0">Seçiniz</option>';
			foreach ($themes as $key => $value) {
				$str .= '<option value="'. $value->id .'">'. $value->name .'</option>';
			}
			$str .= '</select></div>';
			$str .= '<a href="javascript:;" class="btn btn-default btn-outline" id="edit_themes">Temayı Güncelle</a>';
			$str .= '<a href="javascript:;" class="btn btn-outline btn-danger" id="delete_themes">Temayı Sil</a>';
			$str .= '<a href="javascript:;" class="btn btn-outline btn-warning" id="add_themes">Tema Ekle</a>';
			$str .= '<script>
						$(function(){
							$(\'#edit_themes\').on(\'click\',function(){
								var themes_id = $(\'#themes_id\').val();
								if (themes_id == 0) {
									$(\'#resultParentThemes\').html("");
									$(\'#resultThemes\').html("");
									$(\'#themes_area_id\').val(0);
									$(\'.errors\').text(\'tema güncellemek için tema seçmeniz gerekmekte.\');
									return false;
								}
								window.location.href = "backend/themes/edit_themes/"+themes_id;
							});
							$(\'#delete_themes\').on(\'click\',function(){
								var themes_id = $(\'#themes_id\').val();
								if (themes_id == 0) {
									$(\'#resultParentThemes\').html("");
									$(\'#resultThemes\').html("");
									$(\'#themes_area_id\').val(0);
									$(\'.errors\').text(\'tema silmek için tema seçmeniz gerekmekte.\');
									return false;
								}
								window.location.href = "backend/themes/delete_themes/"+themes_id;
							});
							$(\'#add_themes\').on(\'click\',function(){
								var themes_id = $(\'#parent_themes_area_id\').val();
								if (themes_id) {
									themes_id = $(\'#parent_themes_area_id\').val();
								} else {
									themes_id = $(\'#themes_area_id\').val();
								}
								window.location.href = "backend/themes/add_themes/"+themes_id;
							});
						});
					</script>';
		} else {

			$str = '<a href="javascript:;" class="btn btn-outline btn-warning" id="add_themes">Tema Ekle</a>';
			$str .= '<script>
						$(function(){
							$(\'#add_themes\').on(\'click\',function(){
								var themes_id = $(\'#parent_themes_area_id\').val();
								if (themes_id) {
									themes_id = $(\'#parent_themes_area_id\').val();
								} else {
									themes_id = $(\'#themes_area_id\').val();
								}
								window.location.href = "backend/themes/add_themes/"+themes_id;
							});
						});
					</script>';
		}

		echo $str;
		
	}

	public function edit_themes($themes_id) {

		// echo "themes controller = edit themes = ".$themes_id;
		if ($this->input->post()) {
			echo "if";
		} else {
			echo "else";
		}
	}

	public function delete_themes($themes_id) {

		echo "themes controller = delete themes = ".$themes_id;
	}

	public function add_themes($themes_area_id) {

		// echo "themes controller = add themes = ".$themes_area_id;
		if ($this->input->post()) {
			
			
		} else {
			$data['themes_area_id'] = $themes_area_id;
			$this->load->view('backend/layout/header');
			$this->load->view('backend/themes/add_themes',$data);
			$this->load->view('backend/layout/footer');
		}
	}
}
?>