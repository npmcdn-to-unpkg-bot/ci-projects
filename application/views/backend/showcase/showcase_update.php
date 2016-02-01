<script src="assets/admin/dist/js/lib/ckeditor.js"></script>
<script src="assets/admin/bower_components/bootstrap-chosen-master/chosen.jquery.js"></script>
<link rel="stylesheet" href="assets/admin/bower_components/bootstrap-chosen-master/bootstrap-chosen.css">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Vitrin Güncelle</h1>
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
							<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
							<div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="show_home_page" <?php echo (isset($show_home_page))?'checked':''; ?> > Anasayfada Göster</label>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label>Hangi kategorilerde gösterilsin?</label>
								<select data-placeholder="Hangi kategorilerde gösterilmesini istiyorsanız seçiniz." class="chosen-select form-control" name="showcase_to_categories[]" multiple>
									<?php if (isset($showcase_to_categories)): ?>
										<?php foreach ($categories as $key => $value) { ?>
											<?php if (in_array($value->id, $showcase_to_categories)) { ?>
												<option value="<?php echo $value->id; ?>" selected><?php echo $value->name ?></option>
											<?php } else { ?>
												<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
											<?php } ?>
										<?php } ?>
									<?php else: ?>
										<?php foreach ($categories as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
										<?php } ?>
									<?php endif ?>
								</select>
                            </div>
                            <div class="form-group">
                            	<label>Hangi bloglarda gösterilsin?</label>
								<select data-placeholder="Hangi bloglarda gösterilmesini istiyorsanız seçiniz." class="chosen-select form-control" name="showcase_to_blog[]" multiple>
									<?php if (isset($showcase_to_blog)): ?>
										<?php foreach ($blog as $key => $value) { ?>
											<?php if (in_array($value->id, $showcase_to_blog)) { ?>
												<option value="<?php echo $value->id; ?>" selected><?php echo $value->title ?></option>
											<?php } else { ?>
												<option value="<?php echo $value->id; ?>"><?php echo $value->title ?></option>
											<?php } ?>
										<?php } ?>	
									<?php else: ?>
										<?php foreach ($blog as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->title ?></option>
										<?php } ?>
									<?php endif ?>
								</select>
                            </div>
                            <div class="form-group">
                            	<label>Vitrin çercevesi seçiniz</label>
								<select data-placeholder="Vitrin çercevesi seçiniz." class="chosen-select form-control" name="themes_id">
									<option value="0">Seçiniz</option>
									<?php if (isset($themes_id)): ?>
										<?php foreach ($showcase_frame as $key => $value) { ?>
											<?php if ($value->id == $themes_id) { ?>
												<option value="<?php echo $value->id; ?>" selected><?php echo $value->name ?></option>
											<?php } else { ?>
												<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
											<?php } ?>
										<?php } ?>
									<?php else: ?>
										<?php foreach ($showcase_frame as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
										<?php } ?>	
									<?php endif ?>
								</select>
                            </div>
                            <input type="hidden" name="themes_area_id" value="<?php echo $showcase_frame[0]->themes_area_id ?>">
							<div class="form-group">
								<label>Vitrin Başlık</label>
								<input type="text" class="form-control" name="title" value="<?php echo (isset($title))?$title:''; ?>" />
							</div>
							<div class="form-group">
								<label>Vitrin İçerik</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($content))?$content:''; ?></textarea>
							</div>
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<button type="submit" class="btn btn-default">Vitrin Güncelle</button>
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