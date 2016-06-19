<div class="container">
<script src='https://www.google.com/recaptcha/api.js'></script>
<form action="http://localhost/ci-projects/users/myinfo" method="post" accept-charset="utf-8">
<table>
	<tr>
		<td></td>
		<td><?php echo validation_errors('<p style="color:#dc0001;">'); ?>
			<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
            <div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div></td>
	</tr>
	<tr>
		<td>kullanıcı adı:</td>
		<td><input type="text" value="<?php echo $get_users->username ?>" class="form-control" disabled=""><input type="hidden" name="username" value="<?php echo $get_users->username ?>"></td>
	</tr>
	<tr>
		<td>e-posta:</td>
		<td><input type="text" name="email" value="<?php echo $get_users->email ?>" class="form-control"></td>
	</tr>
	<tr>
		<td>ad:</td>
		<td><input type="text" name="name" value="<?php echo $get_users->name ?>" class="form-control"></td>
	</tr>
	<tr>
		<td>soyad:</td>
		<td><input type="text" name="surname" value="<?php echo $get_users->surname ?>" class="form-control"></td>
	</tr>
	<tr>
		<td>cinsiyet:</td>
		<td>
			<div class="form_control"><label for="Bay"><input type="radio" name="gender" value="1" id="bay"> Bay</label>
				<label for="Bayan"><input type="radio" name="gender" value="0" id="bayan"> Bayan</label>
				<input type="hidden" name="gender_value" value="<?php echo $get_users->gender ?>"></div>
		</td>
	</tr>
	<tr>
		<td>doğum tarihi:</td>
		<td><input type="date" name="date_of_birth" class="form-control" value="<?php echo $get_users->date_of_birth; ?>" /><select name="day_of_birth" id="day_of_birth" class="col-lg-4" rel="<?php echo $get_users->day_of_birth ?>">
				<option value="0">Gün</option>
				<?php for ($i=1; $i <= 31; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select><select name="month_of_birth" id="month_of_birth" class="col-lg-4" rel="<?php echo $get_users->month_of_birth ?>">
				<option value="0">Ay</option>
				<?php for ($i=1; $i <= 12; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select><select name="year_of_birth" id="year_of_birth" class="col-lg-4" rel="<?php echo $get_users->year_of_birth ?>">
				<option value="0">Yıl</option>
				<?php for ($i=1938; $i <= 2016; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select></td>
	</tr>
	<tr>
		<td>il:</td>
		<td><select name="city_id" id="city" onchange="findAddress('http://localhost/ci-projects/address/json_county',$(this).val(),'county','option','value')" class="form-control" rel="<?php echo $get_users->city_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($city as $city_key => $city_value): ?>
					<option value="<?php echo $city_value->city_id; ?>"><?php echo $city_value->city_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1"></td>
	</tr>
	<tr>
		<td>ilçe:</td>
		<td><select name="county_id" id="county" onchange="findAddress('http://localhost/ci-projects/address/json_district',$(this).val(),'district','option','value')" class="form-control"  rel="<?php echo $get_users->county_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($county as $county_key => $county_value): ?>
					<option value="<?php echo $county_value->county_id; ?>"><?php echo $county_value->county_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1"></td>
	</tr>
	<tr>
		<td>semt:</td>
		<td><select name="district_id" id="district" onchange="findAddress('http://localhost/ci-projects/address/json_neighborhood',$(this).val(),'neighborhood','option','value')" class="form-control"  rel="<?php echo $get_users->district_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($district as $district_key => $district_value): ?>
					<option value="<?php echo $district_value->district_id; ?>"><?php echo $district_value->district_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1"></td>
	</tr>
	<tr>
		<td>mahalle:</td>
		<td><select name="neighborhood_id" id="neighborhood" class="form-control"  rel="<?php echo $get_users->neighborhood_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($neighborhood as $neighborhood_key => $neighborhood_value): ?>
					<option value="<?php echo $neighborhood_value->neighborhood_id; ?>"><?php echo $neighborhood_value->neighborhood_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1"></td>
	</tr>
	<tr>
		<td>adres:</td>
		<td><textarea name="address" id="address" class="form-control"><?php echo $get_users->address ?></textarea><input type="hidden" name="users_address" value="1"></td>
	</tr>
	<tr>
		<td> </td>
		<td><input type="reset" name="reset" value="Temizle" class="btn btn-lg btn-danger btn-block"><input type="submit" name="submit" value="Üye Kayıt" class="btn btn-lg btn-success btn-block">
			<input type="hidden" name="id" value="<?php echo $get_users->id ?>"></td>
	</tr>
</table>
</form>
<hr>
<form action="http://localhost/ci-projects/users/changemypassword" method="post" accept-charset="utf-8">
<table>
	<tr>
		<td>eski şifre:</td>
		<td><input type="password" name="old_password" value="" placeholder="eski şifreniz" class="old_password form-control"></td>
	</tr>
	<tr>
		<td>eski şifre (tekrar):</td>
		<td><input type="password" name="old_password_conf" value="" placeholder="eski şifreniz (tekrar)" class="old_password_conf form-control"></td>
	</tr>
	<tr>
		<td>yeni şifre:</td>
		<td><input type="password" name="password" value="" placeholder="yeni şifreniz" class="password form-control"></td>
	</tr>
	<tr>
		<td> </td>
		<td><input type="reset" name="reset" value="Temizle" class="btn btn-lg btn-danger btn-block"><input type="submit" name="submit" value="Üye Kayıt" class="btn btn-lg btn-success btn-block">
			<input type="hidden" name="id" value="<?php echo $get_users->id ?>"></td>
	</tr>
</table>
</form>
<script>
	$(document).ready(function(){
		if($('input[name="gender_value"]').val()=='1')
			$('#bay').attr('checked',true);
		else if($('input[name="gender_value"]').val()=='0')
			$('#bayan').attr('checked',true);

		$('#day_of_birth').val($('#day_of_birth').attr('rel'));
		$('#month_of_birth').val($('#month_of_birth').attr('rel'));
		$('#year_of_birth').val($('#year_of_birth').attr('rel'));

		$('#city').val($('#city').attr('rel'));
		$('#county').val($('#county').attr('rel'));
		$('#district').val($('#district').attr('rel'));
		$('#neighborhood').val($('#neighborhood').attr('rel'));
	});
</script>
</div>