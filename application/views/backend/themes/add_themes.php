<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tema Ekle</h1>
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
						<form action="" method="post">
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="default_themes_id" />
										Bu tema varsayılan tema olsun mu?
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="active_themes_id" />
										Bu tema aktif tema olsun mu?
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Tema Adı</label>
								<input type="text" class="form-control" name="name" />
							</div>
							<div class="form-group">
								<label>Tema İçerik</label>
								<textarea name="content" id="themes_content" class="form-control" cols="30" rows="10"></textarea>
							</div>
							<input type="hidden" name="themes_area_id" value="<?php echo $themes_area_id; ?>">
							<button type="submit" class="btn btn-default">Tema Ekle</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace( 'themes_content' );
</script>