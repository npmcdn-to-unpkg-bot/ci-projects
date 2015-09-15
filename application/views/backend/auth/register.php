<div id="register_form">
	<?php echo form_open('backend/auth/create_member'); ?>
	<table>
		<tr>
			<th></th>
			<th>ADMIN REGISTRATION</th>
		</tr>
		<tr>
			<td>ad:</td>
			<td><?php echo form_input('name','','placeholder="adınızı girin"'); ?></td>
		</tr>
		<tr>
			<td>soyad:</td>
			<td><?php echo form_input('surname','','placeholder="soyadınızı girin"'); ?></td>
		</tr>
		<tr>
			<td>email:</td>
			<td><?php echo form_input('email','','placeholder="email adresi girin"'); ?></td>
		</tr>
		<tr>
			<td>username:</td>
			<td><?php echo form_input('surname','','placeholder="username girin"'); ?></td>
		</tr>
		<tr>
			<td>Şifre:</td>
			<td><?php echo form_password('password','','placeholder="şifrenizi girin" class="password"'); ?></td>
		</tr>
		<tr>
			<td>Şifre Tekrarı:</td>
			<td><?php echo form_password('password_confirm','','placeholder="şifre dogrula" class="password_confirm"') ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<?php 
					echo form_submit('submit','üye ol');
					echo form_hidden('url',current_url());
				?>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<?php echo validation_errors();	?>
			</td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>