<script src='https://www.google.com/recaptcha/api.js'></script>
<?php echo form_open('auth/register'); ?>
	<table>
		<tr>
			<td>kullanıcı adı:</td>
			<td><?php echo form_input('username',(isset($username))?$username:'','placeholder="kullanıcı adınız" class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>e-posta:</td>
			<td><?php echo form_input('email',(isset($email))?$email:'','placeholder="e-postanız" class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>ad:</td>
			<td><?php echo form_input('name',(isset($name))?$name:'','placeholder="adınız" class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>soyad:</td>
			<td><?php echo form_input('surname',(isset($surname))?$surname:'','placeholder="soyadınız" class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>şifre:</td>
			<td><?php echo form_password('password','','placeholder="şifreniz" class="password form-control"'); ?></td>
		</tr>
		<tr>
			<td>şifre tekrarı:</td>
			<td><?php echo form_password('password_repeat','','placeholder="şifre tekrarı" class="password form-control"'); ?></td>
		</tr>
		<tr>
			<td>cinsiyet:</td>
			<td>
				<div class="form_control">
					<label for="Bay"><?php echo form_radio('gender','1'); ?> Bay</label>
					<label for="Bayan"><?php echo form_radio('gender','0'); ?> Bayan</label>
				</div>
			</td>
		</tr>
		<tr>
			<td>doğum tarihi:</td>
			<td>
				<input type="date" name="date_of_birth" class="form-control" />
				<select name="day_of_birth" class="col-lg-4">
					<option value="0">Gün</option>
					<?php for ($i=1; $i <= 31; $i++) {
						echo "<option value=".$i.">".$i."</option>";
					} ?>
				</select>
				<select name="month_of_birth" class="col-lg-4">
					<option value="0">Ay</option>
					<?php for ($i=1; $i <= 12; $i++) {
						echo "<option value=".$i.">".$i."</option>";
					} ?>
				</select>
				<select name="year_of_birth" class="col-lg-4">
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
				<select name="city" id="city" onchange="findAddress('http://localhost/ci-projects/address/json_county',$(this).val(),'county','option','value')" class="form-control">
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
				<select name="county" id="county" onchange="findAddress('http://localhost/ci-projects/address/json_district',$(this).val(),'district','option','value')" class="form-control">
					<option value="0">Seçiniz</option>
				</select><input type="hidden" name="users_address" value="1">
			</td>
		</tr>
		<tr>
			<td>semt:</td>
			<td>
				<select name="district" id="district" onchange="findAddress('http://localhost/ci-projects/address/json_neighborhood',$(this).val(),'neighborhood','option','value')" class="form-control">
					<option value="0">Seçiniz</option>
				</select><input type="hidden" name="users_address" value="1">
			</td>
		</tr>
		<tr>
			<td>mahalle:</td>
			<td>
				<select name="neighborhood" id="neighborhood" class="form-control">
					<option value="0">Seçiniz</option>
				</select><input type="hidden" name="users_address" value="1">
			</td>
		</tr>
		<tr>
			<td>adres:</td>
			<td>
				<textarea name="address" id="address" class="form-control"></textarea><input type="hidden" name="users_address" value="1">
			</td>
		</tr>
		<tr>
			<td></td>
			<td><div class="g-recaptcha" data-sitekey="6LcjwRgTAAAAAPbiXi6Pi3EEHW8SUm1D1ejKmyEI"></div></td>
		</tr>
		<tr>
			<td> </td>
			<td>
				<?php echo form_reset('reset','Temizle','class="btn btn-lg btn-danger btn-block"'); ?>
				<?php echo form_submit('submit','Üye Kayıt','class="btn btn-lg btn-success btn-block"'); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<?php 
					echo validation_errors('<p style="color:#dc0001;">');
					echo (isset($errors))? '<p style="color:#dc0001;">'.$errors.'</p>' : '' ;
				?>
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>