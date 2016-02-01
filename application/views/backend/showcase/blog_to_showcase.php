<script src="assets/admin/bower_components/bootstrap-chosen-master/chosen.jquery.js"></script>
<link rel="stylesheet" href="assets/admin/bower_components/bootstrap-chosen-master/bootstrap-chosen.css">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Vitrine Blog Ekle</h1>
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
                            	<label>Blog gösterimi seçiniz</label>
								<select data-placeholder="Vitrin çercevesi seçiniz." class="chosen-select form-control" name="themes_id">
									<option value="0">Seçiniz</option>
									<?php if (isset($themes_id)): ?>
										<?php foreach ($blog_showcase_views as $key => $value) { ?>
											<?php if ($value->id == $themes_id) { ?>
												<option value="<?php echo $value->id; ?>" selected><?php echo $value->name ?></option>
											<?php } else { ?>
												<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
											<?php } ?>
										<?php } ?>
									<?php else: ?>
										<?php foreach ($blog_showcase_views as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
										<?php } ?>	
									<?php endif ?>
								</select>
                            </div>
                            <input type="hidden" name="themes_area_id" value="<?php echo $blog_showcase_views[0]->themes_area_id ?>">
							<div class="form-group">
                            	<label>Bu vitrinde hangi bloglar gösterilsin?</label>
								<select data-placeholder="Bu vitrinde hangi bloglar gösterilsin?" class="chosen-select form-control" name="blog_to_showcase[]" multiple>
									<?php if (isset($blog_to_showcase)): ?>
										<?php foreach ($blog as $key => $value) { ?>
											<?php if (in_array($value->id, $blog_to_showcase)) { ?>
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
                            <input type="hidden" name="id" value="<?php echo $id ?>">
							<button type="submit" class="btn btn-default">Kaydet</button>
							<a href="backend/showcase" type="submit" class="btn btn-default">Vazgeç</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    $('.chosen-select').chosen();
</script>