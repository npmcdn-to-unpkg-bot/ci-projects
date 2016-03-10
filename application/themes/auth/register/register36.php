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
			<td></td>
			<td><div class="g-recaptcha" data-sitekey="6LcjwRgTAAAAAPbiXi6Pi3EEHW8SUm1D1ejKmyEI"></div></td>
		</tr>
		<tr>
			<td> </td>
			<td><?php echo form_submit('submit','Üye Kayıt','class="btn btn-lg btn-success btn-block"'); ?></td>
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