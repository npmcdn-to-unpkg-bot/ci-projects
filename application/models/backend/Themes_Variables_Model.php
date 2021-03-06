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
		return $themes_variables = array(
			'site_url' => site_url(),
			'logo' => '<img src="'.$db_site_logo[0]->settings_value.'" />',
			'kategori menüsü' => '<?php include(APPPATH.$header_category[0]->file_path); ?>',
			'kullanıcı adı' => '<?php echo $this->session->userdata("username") ?>'
		);
	}
	
	function header_category() {
		return $themes_variables = array(
			'ana kategori' => '<?php foreach ($categories as $key => $value) { ?>',
			'ana kategori (id)' => '<?php echo $value->id ?>',
			'ana kategori (linki)' => '<?php echo ($value->perma_active)?$value->perma_link:$value->cat_link; ?>',
			'ana kategori (adı)' => '<?php echo $value->name ?>',
			'ana kategori (aciklama)' => '<?php echo $value->description ?>',
			'/ana kategori' => '<?php } ?>',
			'alt kategori' => '<?php if (isset($value->childs)) { echo "<ul class=\'submenu\'>"; foreach ($value->childs as $key2 => $value2) { ?>',
			'alt kategori (id)' => '<?php echo $value2->id ?>',
			'alt kategori (linki)' => '<?php echo ($value2->perma_active)?$value2->perma_link:$value2->cat_link; ?>',
			'alt kategori (adı)' => '<?php echo $value2->name ?>',
			'alt kategori (aciklama)' => '<?php echo $value2->description ?>',
			'/alt kategori' => '<?php } echo "</ul>"; } ?>',
			'alt kategori 2' => '<?php if (isset($value2->childs)) { echo "<ul class=\'submenu2\'>"; foreach ($value2->childs as $key3 => $value3) { ?>',
			'alt kategori 2 (id)' => '<?php echo $value3->id ?>',
			'alt kategori 2 (linki)' => '<?php echo ($value3->perma_active)?$value3->perma_link:$value3->cat_link; ?>',
			'alt kategori 2 (adı)' => '<?php echo $value3->name ?>',
			'alt kategori 2 (aciklama)' => '<?php echo $value3->description ?>',
			'/alt kategori 2' => '<?php } echo "</ul>"; } ?>',
		);
	}

	function footer() {
		// category
		$this->load->model('backend/categories_model');
		$category = $this->categories_model->get_categories();
		return $themes_variables = array(
			'footer logo' => '<img src="assets/uploads/images/logo.png" />',
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

	function blog_list() {
		return $themes_variables = array(
			'sayfa link' => '<?php echo ($blog_value->perma_active)?$blog_value->perma_link:$blog_value->pages_link; ?>',
			'sayfa başlık' => '<?php echo ($blog_value->list_title)? $blog_value->list_title : $blog_value->title ; ?>',
			'sayfa resim' => '<img src="<?php echo $blog_value->list_image ?>" />',
			'sayfa içerik' => '<?php echo ($blog_value->list_content)? $blog_value->list_content : $blog_value->content ;  ?>'
		);
	}

	function blog_comments() {
		return $themes_variables = array(
			'üye girişi var' => '<?php if($this->session->userdata("user")) { ?>',
			'/üye girişi var' => '<?php } ?>',
			'üye girişi yok' => '<?php if(!$this->session->userdata("user")) { ?>',
			'/üye girişi yok' => '<?php } ?>',
			'yorumlar' => '<?php if (isset($blog_comments_value)) { foreach ($blog_comments_value as $blogc_key => $blogc_value) { ?>',
			'yorumlar(ad)' => '<?php echo $blogc_value->name ?>',
			'yorumlar(soyad)' => '<?php echo $blogc_value->surname ?>',
			'yorumlar(email)' => '<?php echo $blogc_value->email ?>',
			'yorumlar(tarih)' => '<?php echo $blogc_value->created_time ?>',
			'yorumlar(başlık)' => '<?php echo $blogc_value->title ?>',
			'yorumlar(içerik)' => '<?php echo $blogc_value->content ?>',
			'/yorumlar' => '<?php } } ?>',
			'hata mesajı' => '<div class="blog_comments_message"></div>',
			'ad' => '<input class="form-control blog_comments_name" name="blog_comments_name">',
			'soyad' => '<input class="form-control blog_comments_surname" name="blog_comments_surname">',
			'email' => '<input class="form-control blog_comments_email" name="blog_comments_email">',
			'blog başlık' => '<input class="form-control blog_comments_title" name="blog_comments_title">',
			'blog içerik' => '<textarea name="blog_comments_content" class="form-control blog_comments_content" rows="5"></textarea>',
			'yorum yap' => '<a href="javascript:;" onclick="blog_comments()" class="btn btn-default blog_comments_btn">Yorum yap</a>
		<input type="hidden" value="<?php echo $blog_value->id; ?>" name="blog_id">
		<?php if($this->session->userdata("user")) { ?>
<input type="hidden" value="<?php echo $this->session->userdata("user")["id"] ?>" name="user_id">
<input type="hidden" name="blog_comments_name" value="<?php echo $this->session->userdata("user")["name"] ?>">
<input type="hidden" name="blog_comments_surname" value="<?php echo $this->session->userdata("user")["surname"] ?>">
<input type="hidden" name="blog_comments_email" value="<?php echo $this->session->userdata("user")["email"] ?>"> 
		<?php } ?>',
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
	
	function category() {
		return $themes_variables = array(
			'slider' => '<?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?>',
			'banner' => '<?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?>',
			'vitrin' => '<?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?>',
			'leftbar' => '<?php if (isset($sidebar_leftbar)) { require(APPPATH.$sidebar_leftbar[0]->file_path); } ?>',
			'rightbar' => '<?php if (isset($sidebar_rightbar)) { require(APPPATH.$sidebar_rightbar[0]->file_path); } ?>',
		);
	}

	function blog_views() {
		return $themes_variables = array(
			'vitrin' => '<?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?>',
			'leftbar' => '<?php if (isset($sidebar_leftbar)) { require(APPPATH.$sidebar_leftbar[0]->file_path); } ?>',
			'rightbar' => '<?php if (isset($sidebar_rightbar)) { require(APPPATH.$sidebar_rightbar[0]->file_path); } ?>',
			'sayfa link' => '<?php echo ($blog_value->perma_link)?$blog_value->perma_link:$blog_value->pages_link; ?>',
			'sayfa başlık' => '<?php echo $blog_value->title ?>',
			'sayfa içerik' => '<?php echo $blog_value->content ?>',
			'sayfa listeleme resim' => '<?php if (isset($blog_value->list_image)) { ?><img src="<?php echo $blog_value->list_image ?>" /><?php } ?>',
			'hızlı menü' => '<?php if (isset($blog_qlink)) { foreach ($blog_qlink as $key => $qlink) { ?>',
			'hızlı menü id' => '<?php echo $qlink->id ?>',
			'hızlı menü tipi' => '<?php echo $qlink->pages_type ?>',
			'hızlı menü linki' => '<?php echo ($qlink->perma_link)?$qlink->perma_link:$qlink->pages_link; ?>',
			'hızlı menü başlık' => '<?php echo $qlink->title ?>',
			'/hızlı menü' => '<?php } } ?>',
			'yorum sistemi' => '<?php if (isset($blog_comments)) { require(APPPATH.$blog_comments[0]->file_path); } ?>',
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