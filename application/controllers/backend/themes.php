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
		
		$this->load->model('backend/themes_model');
		$data['themes'] = $themes = $this->themes_model->get_themes_area_parent();

		$this->load->view('backend/layout/header');
		$this->load->view('backend/themes/themes_management',$data);
		$this->load->view('backend/layout/footer');
	}

	public function check_if_parent_themes_exists() {

		$parent_id = $this->input->post('parent_id');
		$this->load->model('backend/themes_model');
		$themes = $this->themes_model->get_themes_area_parent($parent_id);

		if ($themes) {

			$this->parent_themes_exists($themes);
		} else {

			$themes = $this->themes_model->get_themes_list($parent_id);
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
			$str .= '<option value="'.$value->id.'">'.$value->name.'</option>';
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
				if ($value->default_themes_id == "1" && $value->active_themes_id == "1") {
					$str .= '<option value="'.$value->id.'">'.$value->name.' (Varsayılan Tema , Aktif Tema)</option>';
				} else if ($value->default_themes_id == "1") {
					$str .= '<option value="'.$value->id.'">'.$value->name.' (Varsayılan Tema)</option>';
				} else if ($value->active_themes_id == "1") {
					$str .= '<option value="'.$value->id.'">'.$value->name.' (Aktif Tema)</option>';
				} else {
					$str .= '<option value="'.$value->id.'">'.$value->name.'</option>';
				}
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

	public function add_themes($themes_area_id) {

		$this->load->model('backend/themes_model');
		$this->load->model('backend/themes_variables_model');
		$themes = $this->themes_model->get_themes_area_where($themes_area_id);
		$class_name = $themes[0]->class_name;
		$data['themes_variables'] = $this->themes_variables_model->$class_name();
		$data['themes_area_id'] = $themes[0]->id;
		$data['themes_area_name'] = $themes[0]->name;
		$data['file_path'] = $themes[0]->file_path;

		if ($this->input->post()) {
			
			$this->load->library('form_validation');

			// form_validation
			$this->form_validation->set_rules('name','','trim|required');
			$this->form_validation->set_rules('content','','trim|required');

			if ($this->form_validation->run() === FALSE) {

				$data['name'] = $this->input->input_stream('name');
				$data['content'] = $this->input->input_stream('content');
				$this->load->view('backend/layout/header');
				$this->load->view('backend/themes/add_themes',$data);
				$this->load->view('backend/layout/footer');
			} else {
				// var_dump($this->input->post());
				if ( $this->input->post('default_themes_id') ) {	
					$this->themes_model->check_if_default_themes_id_exists();	
				}

				if ( $this->input->post('active_themes_id') ) {
					$this->themes_model->check_if_active_themes_id_exists();
				}

				$this->load->library('parser');
				$content = $this->parser->parse_string($this->input->post('content', FALSE),$this->themes_variables_model->$class_name());
				$this->themes_model->add_themes($content);
				redirect('backend/themes');
			}
		} else {

			$this->load->view('backend/layout/header');
			$this->load->view('backend/themes/add_themes',$data);
			$this->load->view('backend/layout/footer');
		}
	}

	public function edit_themes($themes_id) {

		$this->load->model('backend/themes_model');

		$themes = $this->themes_model->get_themes($themes_id);
		foreach ($themes[0] as $key => $value) {
			$data[$key] = $value;
		}

		$this->load->model('backend/themes_variables_model');
		$themes = $this->themes_model->get_themes_area_where($data['themes_area_id']);
		$class_name = $themes[0]->class_name;
		$data['themes_variables'] = $this->themes_variables_model->$class_name();
		
		if ($this->input->post()) {

			$this->load->library('form_validation');

			// form_validation
			$this->form_validation->set_rules('name','','trim|required');
			$this->form_validation->set_rules('content','','trim|required');
			if ($data['default_themes_id'] == "1") {
				$this->form_validation->set_rules('default_themes_id','Varsayılan temanızı buradan pasif edemezsiniz.','trim|required');
			}
			if ($data['active_themes_id'] == "1") {
				$this->form_validation->set_rules('active_themes_id','Aktif temanızı buradan pasif edemezsiniz.','trim|required');
			}

			if ($this->form_validation->run() === FALSE) {

				$data['name'] = $this->input->input_stream('name');
				$data['content'] = $this->input->input_stream('content');
				$this->load->view('backend/layout/header');
				$this->load->view('backend/themes/edit_themes',$data);
				$this->load->view('backend/layout/footer');
			} else {

				if ( $this->input->post('default_themes_id') ) {
					$this->themes_model->check_if_default_themes_id_exists();	
				}

				if ( $this->input->post('active_themes_id') ) {
					$this->themes_model->check_if_active_themes_id_exists();
				}
				$this->load->library('parser');
				$content = $this->parser->parse_string($this->input->post('content', FALSE),$this->themes_variables_model->$class_name());
				$this->themes_model->edit_themes($content);
				redirect('backend/themes/edit_themes/'.$this->input->post('themes_id'));
			}
		} else {
			
			$this->load->view('backend/layout/header');
			$this->load->view('backend/themes/edit_themes',$data);
			$this->load->view('backend/layout/footer');
		}
	}

	public function delete_themes($themes_id) {
		
		$this->load->model('backend/themes_model');
		$themes = $this->themes_model->get_themes($themes_id);
		foreach ($themes as $key => $value) {
			$data[$key] = $value;
		}

		if ($data[0]->default_themes_id == 1) {
			$this->session->set_flashdata('errors','​varsayılan temayı silemezsiniz.');
			redirect('backend/themes');
		} else if ($data[0]->active_themes_id == 1) {
			$this->themes_model->active_delete_themes($themes_id);
		} else {
			$this->themes_model->delete_themes($themes_id);
		}
	}

	public function themes_parser() {
		$this->load->library('parser');

		$template = '<div id="header">
		<div class="logo"><a href="#">{logo}</a></div>
		<div class="hmenu">
			<ul class="hmenu_ul">
				{kategoriler}
				<li><a href="{link}">{name}</a></li>
				{/kategoriler}
			</ul>
		</div>
		</div>';
		$data = array(
			'logo' => '<img src="'.base_url().'/assets/uploads/system/images/logo.jpg" width="200"/>',
			'kategoriler' => array(
				array('name' => 'mutfak','link' => 'mutfak.php'),
				array('name' => 'elektrik','link' => 'elektrik.php')
			)
		);
		$q = $this->parser->parse_string($template, $data);
		return $q;
		exit;
	}
}
?>