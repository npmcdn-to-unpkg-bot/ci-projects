<script src='https://www.google.com/recaptcha/api.js'></script>
<?php echo form_open('users/myinfo'); ?>
<table>
	<tr>
		<td></td>
		<td>
			<?php 
				echo validation_errors('<p style="color:#dc0001;">');
				echo (isset($errors))? '<p style="color:#dc0001;">'.$errors.'</p>' : '' ;
			?>
		</td>
	</tr>
	<tr>
		<td>kullanıcı adı:</td>
		<td><?php echo form_input('username',$get_users->username,'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>e-posta:</td>
		<td><?php echo form_input('email',$get_users->email,'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>ad:</td>
		<td><?php echo form_input('name',$get_users->name,'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>soyad:</td>
		<td><?php echo form_input('surname',$get_users->surname,'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>cinsiyet:</td>
		<td>
			<div class="form_control">
				<label for="Bay"><input type="radio" name="gender" value="1" id="bay"> Bay</label>
				<label for="Bayan"><input type="radio" name="gender" value="0" id="bayan"> Bayan</label>
				<input type="hidden" name="gender_value" value="<?php echo $get_users->gender ?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>doğum tarihi:</td>
		<td>
			<input type="date" name="date_of_birth" class="form-control" value="<?php echo $get_users->date_of_birth; ?>" />
			<select name="day_of_birth" id="day_of_birth" class="col-lg-4" rel="<?php echo $get_users->day_of_birth ?>">
				<option value="0">Gün</option>
				<?php for ($i=1; $i <= 31; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select>
			<select name="month_of_birth" id="month_of_birth" class="col-lg-4" rel="<?php echo $get_users->month_of_birth ?>">
				<option value="0">Ay</option>
				<?php for ($i=1; $i <= 12; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select>
			<select name="year_of_birth" id="year_of_birth" class="col-lg-4" rel="<?php echo $get_users->year_of_birth ?>">
				<option value="0">Yıl</option>
				<?php for ($i=1938; $i <= 2016; $i++) {
					echo "<option value=".$i.">".$i."</option>";
				} ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>il:</td>
		<td>
			<select name="city_id" id="city" onchange="findAddress('http://localhost/ci-projects/address/json_county',$(this).val(),'county','option','value')" class="form-control" rel="<?php echo $get_users->city_id ?>">
				<option value="0">Seçiniz</option>
				<?php foreach ($city as $city_key => $city_value): ?>
					<option value="<?php echo $city_value->city_id; ?>"><?php echo $city_value->city_name; ?></option>
				<?php endforeach ?>
			</select><input type="hidden" name="users_address" value="1">
		</td>
	</tr>
	<tr>
		<td>ilçe:</td>
		<td>
			<select name="county_id" id="county" onchange="findAddress('http://localhost/ci-projects/address/json_district',$(this).val(),'district','option','value')" class="form-control"  rel="<?php echo $get_users->county_id ?>">
				<option value="0">Seçiniz</option>
			</select><input type="hidden" name="users_address" value="1">
		</td>
	</tr>
	<tr>
		<td>semt:</td>
		<td>
			<select name="district_id" id="district" onchange="findAddress('http://localhost/ci-projects/address/json_neighborhood',$(this).val(),'neighborhood','option','value')" class="form-control"  rel="<?php echo $get_users->district_id ?>">
				<option value="0">Seçiniz</option>
			</select><input type="hidden" name="users_address" value="1">
		</td>
	</tr>
	<tr>
		<td>mahalle:</td>
		<td>
			<select name="neighborhood_id" id="neighborhood" class="form-control"  rel="<?php echo $get_users->neighborhood_id ?>">
				<option value="0">Seçiniz</option>
			</select><input type="hidden" name="users_address" value="1">
		</td>
	</tr>
	<tr>
		<td>adres:</td>
		<td>
			<textarea name="address" id="address" class="form-control"><?php echo $get_users->address ?></textarea><input type="hidden" name="users_address" value="1">
		</td>
	</tr>
	<tr>
		<td> </td>
		<td>
			<input type="hidden" name="id" value="<?php echo $get_users->id ?>">
			<?php echo form_reset('reset','Temizle','class="btn btn-lg btn-danger btn-block"'); ?>
			<?php echo form_submit('submit','Üye Kayıt','class="btn btn-lg btn-success btn-block"'); ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>
<hr>
<?php echo form_open('users/changemypassword'); ?>
<table>
	<tr>
		<td>eski şifre:</td>
		<td><?php echo form_password('old_password','','placeholder="eski şifreniz" class="old_password form-control"'); ?></td>
	</tr>
	<tr>
		<td>eski şifre (tekrar):</td>
		<td><?php echo form_password('old_password_conf','','placeholder="eski şifreniz (tekrar)" class="old_password_conf form-control"'); ?></td>
	</tr>
	<tr>
		<td>yeni şifre:</td>
		<td><?php echo form_password('password','','placeholder="yeni şifreniz" class="password form-control"'); ?></td>
	</tr>
	<tr>
		<td> </td>
		<td>
			<input type="hidden" name="id" value="<?php echo $get_users->id ?>">
			<?php echo form_reset('reset','Temizle','class="btn btn-lg btn-danger btn-block"'); ?>
			<?php echo form_submit('submit','Üye Kayıt','class="btn btn-lg btn-success btn-block"'); ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>
<script>
	$(document).ready(function(){
		if($('input[name="gender_value"]').val()=='1')
			$('#bay').attr('checked',true);
		else if($('input[name="gender_value"]').val()=='0')
			$('#bayan').attr('checked',true);

		$('#day_of_birth').val($('#day_of_birth').attr('rel'));
		$('#month_of_birth').val($('#month_of_birth').attr('rel'));
		$('#year_of_birth').val($('#year_of_birth').attr('rel'));

		$('#city').val($('#city').attr('rel'));$('#city').change();
		setTimeout(function(){$('#county').val($('#county').attr('rel')).change();},100);
		setTimeout(function(){$('#district').val($('#district').attr('rel')).change();},300);
		setTimeout(function(){$('#neighborhood').val($('#neighborhood').attr('rel')).change();},500);
	});
</script>