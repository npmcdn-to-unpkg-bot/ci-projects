<?php  
/**
* Themes_Variables_Model
*/
class Themes_Variables_Model extends CI_Model
{
	
	function header() {
		// site logo
		$this->db->where('settings_name','site_logo');
		$db_site_logo = $this->db->get('site_settings');
		$db_site_logo = $db_site_logo->result();
		// category
		$this->load->model('backend/categories_model');
		$category = $this->categories_model->get_categories();
		$category0 = $this->catTree($category,0,0);
		$category1 = $this->catTree($category,0,1);
		$category2 = $this->catTree($category,0,2);
		return $themes_variables = array(
			'site_url' => site_url(),
			'logo' => '<img src="'.$db_site_logo[0]->settings_value.'" />',
			'ana kategori' => $category0,
			'ana kategori 1' => $category1,
			'ana kategori 2' => $category2,
			'kullanıcı adı' => '<?php echo $this->session->userdata("username") ?>'
		);
	}

	function catTree($array, $currentParent, $catLevel, $currLevel = 0, $prevLevel = 0) {
		$tree = "";
		foreach ($array as $category) {
			if ($currentParent == $category->parent_id) {
				if ($currLevel <= $catLevel) {
					if ($currLevel > $prevLevel) $tree .= "<ul class='submenu'>";
					if ($currLevel == $prevLevel) $tree .= "</li>";
					($category->status == 1)?$status = 'active':$status = 'passive';
					$tree .= '<li><a href="categories/'.$category->id.'" title="'.$category->description.'" class="'.$status.'">'.$category->name.'</a>';
					if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
					$currLevel++;
					$tree .= $this->catTree($array, $category->id, $catLevel, $currLevel, $prevLevel);
					$currLevel--;
				}
			}
		}
		if ($currLevel == $prevLevel) $tree .= "</li></ul>";
		return $tree;
	}

	function footer() {
		// category
		$this->load->model('backend/categories_model');
		$category = $this->categories_model->get_categories();
		$category0 = $this->catTree($category,0,0);
		$category1 = $this->catTree($category,0,1);
		$category2 = $this->catTree($category,0,2);
		return $themes_variables = array(
			'footer logo' => '<img src="assets/uploads/images/logo.png" />',
			'ana kategori' => $category0,
			'ana kategori 1' => $category1,
			'ana kategori 2' => $category2,
			'kullanıcı adı' => '<?php echo $this->session->userdata("username") ?>'
		);
	}

	function showcase_frame() {
		return $themes_variables = array(
			'vitrin başlık' => '<?php echo $showcase_value->title ?>',
			'vitrin içerik' => '<?php echo $showcase_value->content ?>',
			'blog listele' => '<?php foreach ($showcase_value->blog as $blog_key => $blog_value): ?><?php include(APPPATH.$blog_value->file_path); ?><?php endforeach ?>'
		);
	}

	function blog_views() {
		return $themes_variables = array(
			'sayfa link(perma)' => '<?php echo $blog_value->perma_link ?>',
			'sayfa link' => '<?php echo $blog_value->pages_link ?>',
			'sayfa başlık' => '<?php echo $blog_value->list_title ?>',
			'sayfa resim' => '<img src="<?php echo $blog_value->list_image ?>" />',
			'sayfa içerik' => '<?php echo $blog_value->list_content ?>'
		);
	}

	function blog_list() {
		return $themes_variables = array(
			'sayfa link(perma)' => '<?php echo $blog_value->perma_link ?>',
			'sayfa link' => '<?php echo $blog_value->pages_link ?>',
			'sayfa başlık' => '<?php echo $blog_value->list_title ?>',
			'sayfa resim' => '<img src="<?php echo $blog_value->list_image ?>" />',
			'sayfa içerik' => '<?php echo $blog_value->list_content ?>'
		);
	}

	function sidebar_frame() {
		return $themes_variables = array(
			'bileşen başlık' => '<?php echo $sidebar_value->title ?>',
			'bileşen içerik' => '<?php echo $sidebar_value->content ?>'
		);
	}

	function sidebar_leftbar() {
		return $themes_variables = array(
			'içerik' => '<?php if (isset($leftbar)) { foreach($leftbar as $sidebar_key => $sidebar_value) {include(APPPATH.$sidebar_value->file_path);} } ?>'
		);
	}

	function sidebar_rightbar() {
		return $themes_variables = array(
			'içerik' => '<?php if (isset($rightbar)) { foreach($rightbar as $sidebar_key => $sidebar_value) {include(APPPATH.$sidebar_value->file_path);} } ?>'
		);
	}

	function home() {
		return $themes_variables = array(
			'slider' => '<?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?>',
			'banner' => '<?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?>',
			'vitrin' => '<?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?>',
			'leftbar' => '<?php if (isset($sidebar_leftbar)) { require(APPPATH.$sidebar_leftbar[0]->file_path); } ?>',
			'rightbar' => '<?php if (isset($sidebar_rightbar)) { require(APPPATH.$sidebar_rightbar[0]->file_path); } ?>',
		);
	}
	
	function category_listing() {
		return $themes_variables = array(
			'slider' => '<?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?>',
			'banner' => '<?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?>',
			'vitrin' => '<?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?>',
			'leftbar' => '<?php if (isset($sidebar_leftbar)) { require(APPPATH.$sidebar_leftbar[0]->file_path); } ?>',
			'rightbar' => '<?php if (isset($sidebar_rightbar)) { require(APPPATH.$sidebar_rightbar[0]->file_path); } ?>',
		);
	}

	function slider() {
		return $themes_variables = array(
			'slider' => '<?php foreach ($slider as $slider_key => $slider_value): ?>',
			'slider link' => '<?php echo $slider_value->link ?>',
			'slider alt_text' => '<?php echo $slider_value->alt_text ?>',
			'slider resim' => '<?php echo $slider_value->image ?>',
			'/slider' => '<?php endforeach ?>'
		);
	}

	function banner() {
		return $themes_variables = array(
			'banner' => '<?php foreach ($banner as $banner_key => $banner_value): ?>',
			'banner link' => '<?php echo $banner_value->link ?>',
			'banner alt_text' => '<?php echo $banner_value->alt_text ?>',
			'banner resim' => '<?php echo $banner_value->image ?>',
			'/banner' => '<?php endforeach ?>'
		);
	}

	function login() {
		return $themes_variables = array(
		);
	}

	function register() {
		return $themes_variables = array(
		);
	}
	
	function myinfo() {
		return $themes_variables = array(
			'kullanıcı adı' => '<input type="text" value="<?php echo $get_users->username ?>" class="form-control" disabled=""><input type="hidden" name="username" value="<?php echo $get_users->username ?>">',
			'eposta' => '<input type="text" name="email" value="<?php echo $get_users->email ?>" class="form-control">',
			'ad' => '<input type="text" name="name" value="<?php echo $get_users->name ?>" class="form-control">',
			'soyad' => '<input type="text" name="surname" value="<?php echo $get_users->surname ?>" class="form-control">',
			'cinsiyet' => '<label for="Bay"><input type="radio" name="gender" value="1" id="bay"> Bay</label>
				<label for="Bayan"><input type="radio" name="gender" value="0" id="bayan"> Bayan</label>
				<input type="hidden" name="gender_value" value="<?php echo $get_users->gender ?>">',
			'doğum günü tarihi' => '<input type="date" name="date_of_birth" class="form-control" value="<?php echo $get_users->date_of_birth; ?>" />',
			'doğum (gün)' => '<select name="day_of_birth" id="day_of_birth" class="col-lg-4" rel="<?php echo $get_users->day_of_birth ?>">
				<option value="0">Gün</option>
				<?php for ($i=1; $i <= 31; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select>',
			'doğum (ay)' => '<select name="month_of_birth" id="month_of_birth" class="col-lg-4" rel="<?php echo $get_users->month_of_birth ?>">
				<option value="0">Ay</option>
				<?php for ($i=1; $i <= 12; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select>',
			'doğum (yıl)' => '<select name="year_of_birth" id="year_of_birth" class="col-lg-4" rel="<?php echo $get_users->year_of_birth ?>">
				<option value="0">Yıl</option>
				<?php for ($i=1938; $i <= 2016; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select>',
			'il' => '<select name="city_id" id="city" onchange="findAddress(\'http://localhost/ci-projects/address/json_county\',$(this).val(),\'county\',\'option\',\'value\')" class="form-control" rel="<?php echo $get_users->city_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($city as $city_key => $city_value): ?>
					<option value="<?php echo $city_value->city_id; ?>"><?php echo $city_value->city_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1">',
			'ilçe' => '<select name="county_id" id="county" onchange="findAddress(\'http://localhost/ci-projects/address/json_district\',$(this).val(),\'district\',\'option\',\'value\')" class="form-control"  rel="<?php echo $get_users->county_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($county as $county_key => $county_value): ?>
					<option value="<?php echo $county_value->county_id; ?>"><?php echo $county_value->county_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1">',
			'semt' => '<select name="district_id" id="district" onchange="findAddress(\'http://localhost/ci-projects/address/json_neighborhood\',$(this).val(),\'neighborhood\',\'option\',\'value\')" class="form-control"  rel="<?php echo $get_users->district_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($district as $district_key => $district_value): ?>
					<option value="<?php echo $district_value->district_id; ?>"><?php echo $district_value->district_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1">',
			'mahalle' => '<select name="neighborhood_id" id="neighborhood" class="form-control"  rel="<?php echo $get_users->neighborhood_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($neighborhood as $neighborhood_key => $neighborhood_value): ?>
					<option value="<?php echo $neighborhood_value->neighborhood_id; ?>"><?php echo $neighborhood_value->neighborhood_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1">',
			'adres' => '<textarea name="address" id="address" class="form-control"><?php echo $get_users->address ?></textarea><input type="hidden" name="users_address" value="1">',
			'eski şifre' => '<input type="password" name="old_password" value="" placeholder="eski şifreniz" class="old_password form-control">',
			'eski şifre(tekrar)' => '<input type="password" name="old_password_conf" value="" placeholder="eski şifreniz (tekrar)" class="old_password_conf form-control">',
			'yeni şifre' => '<input type="password" name="password" value="" placeholder="yeni şifreniz" class="password form-control">',
			'hata mesajı' => '<?php echo validation_errors(\'<p style="color:#dc0001;">\'); ?>
			<div class="errors"><?php echo (!empty($this->session->flashdata(\'errors\'))) ? $this->session->flashdata(\'errors\') : \'\' ; ?></div>
            <div class="success"><?php echo (!empty($this->session->flashdata(\'success\'))) ? $this->session->flashdata(\'success\') : \'\' ; ?></div>',
			'submit butonu' => '<input type="submit" name="submit" value="Üye Kayıt" class="btn btn-lg btn-success btn-block">
			<input type="hidden" name="id" value="<?php echo $get_users->id ?>">',
			'temizleme butonu' => '<input type="reset" name="reset" value="Temizle" class="btn btn-lg btn-danger btn-block">'

		);
	}
	
	function changemypassword() {
		return $themes_variables = array(
		);
	}

}
?>