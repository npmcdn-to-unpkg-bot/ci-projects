<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tema Güncelle</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-10 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<?php
							echo validation_errors('<p style="color:#dc0001;">');
						?>
						<form action="" method="post">
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="default_themes_id" value="1" <?php if($default_themes_id == "1"){ echo "checked='checked'"; } ?>/>
										Bu tema varsayılan tema olsun mu?
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="active_themes_id" value="1" <?php if($active_themes_id == "1"){ echo "checked='checked'"; } ?>/>
										Bu tema aktif tema olsun mu?
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Tema Adı</label>
								<input type="text" class="form-control" name="name" value="<?php if(isset($name)){echo $name;} ?>" />
							</div>
							<div class="form-group">
								<label>Tema Değişkenleri</label>
								<p>
									<?php 
										foreach ($themes_variables as $key => $value) {
											echo '{'.$key.'}' . '<br/>';
										}
									?>
								</p>
							</div>
							<div class="form-group">
								<label>Tema İçerik</label>
								<textarea name="content" id="themes_content" class="form-control" cols="30" rows="10"><?php if(isset($content)){echo $content;} ?></textarea>
							</div>
							<input type="hidden" name="themes_area_id" value="<?php echo $themes_area_id; ?>">
							<input type="hidden" name="file_path" value="<?php echo $file_path; ?>">
							<input type="hidden" name="themes_id" value="<?php echo $id; ?>">
							<button type="submit" class="btn btn-default">Tema Güncelle</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>