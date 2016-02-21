<?php echo form_open('auth/login'); ?>
	<table>
		<tr>
			<td>kullanıcı adı:</td>
			<td><?php echo form_input('username',(isset($username))?$username:'','placeholder="Kullanıcı adınız" class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>şifre:</td>
			<td><?php echo form_password('password','','placeholder="Şifreniz" class="password form-control"'); ?></td>
		</tr>
		<tr>
			<td> </td>
			<td><?php echo form_submit('submit','Giriş Yap','class="btn btn-lg btn-success btn-block"'); ?></td>
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