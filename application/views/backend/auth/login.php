<div id="login_form">
<?php echo form_open('backend/auth/validate_credentials'); ?>
	<table>
		<tr>
			<th></th>
			<th>
				<?php if (isset($account_created)) { 
					echo $account_created;
				} else { ?>
					ADMIN LOGIN
				<?php } ?>
			</th>
		</tr>
		<tr>
			<td>kullanıcı adı:</td>
			<td><?php echo form_input('username','','placeholder="Kullanıcı adınız"'); ?></td>
		</tr>
		<tr>
			<td>şifre:</td>
			<td><?php echo form_password('password','','placeholder="Şifreniz" class="password"'); ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<?php 
					echo form_submit('submit','giriş yap');
					echo form_hidden('url',current_url()); 
				?>
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>
</div>