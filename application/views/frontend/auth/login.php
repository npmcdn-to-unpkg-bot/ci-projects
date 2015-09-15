<form action="" method="post">
	<table>
		<tr>
			<td>kullanıcı adı:</td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td>şifre:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="giriş yap" /></td>
		</tr>
	</table>
</form>
<?php 
if ($sessions) {
	echo $sessions;
} 
?>