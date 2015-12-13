<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<script src="assets/admin/bower_components/bootstrap-chosen-master/chosen.jquery.js"></script>
<link rel="stylesheet" href="assets/admin/bower_components/bootstrap-chosen-master/bootstrap-chosen.css">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Vitrin Ekle</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-10 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<form action="" method="post">
						<div class="col-lg-12">
							<?php echo validation_errors('<p style="color:#dc0001;">'); ?>
							<div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="show_home_page"> Anasayfada Göster</label>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label>Hangi kategorilerde gösterilsin?</label>
								<select data-placeholder="Hangi kategorilerde gösterilmesini istiyorsanız seçiniz." class="chosen-select form-control" multiple>
									<option>American Black Bear</option>
									<option>Asiatic Black Bear</option>
									<option>Brown Bear</option>
									<option>Giant Panda</option>
									<option>Sloth Bear</option>
									<option>Sun Bear</option>
									<option>Polar Bear</option>
									<option>Spectacled Bear</option>
								</select>
                            </div>
							<div class="form-group">
								<label>Vitrin Başlık</label>
								<input type="text" class="form-control" name="title" value="<?php echo (isset($title))?$title:''; ?>" />
							</div>
							<div class="form-group">
								<label>Vitrin İçerik</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($content))?$content:''; ?></textarea>
							</div>
							<button type="submit" class="btn btn-default">Vitrin Ekle</button>
							<a href="backend/showcase" type="submit" class="btn btn-default">Vazgeç</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    CKEDITOR.replace( 'content' );
    $('.chosen-select').chosen();
</script>