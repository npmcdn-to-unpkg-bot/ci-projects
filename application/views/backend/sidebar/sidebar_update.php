<script src="assets/admin/dist/js/lib/ckeditor.js"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sağ / Sol Bileşen Güncelle</h1>
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
							<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
							<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
							<div class="form-group">
                                <div class="radio">
                                    <label><input type="radio" name="which_side" value="left" <?php echo (isset($which_side) && $which_side == 'left')?'checked="checked"':''; ?> > Sol</label>
                                    <label><input type="radio" name="which_side" value="right" <?php echo (isset($which_side) && $which_side == 'right')?'checked="checked"':''; ?> > Sağ</label>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label>Bileşen teması seçiniz</label>
								<select data-placeholder="Bileşen teması seçiniz." class="chosen-select form-control" name="themes_id">
									<option value="0">Seçiniz</option>
									<?php if (isset($themes_id)): ?>
										<?php foreach ($sidebar_frame as $key => $value) { ?>
											<?php if ($value->id == $themes_id) { ?>
												<option value="<?php echo $value->id; ?>" selected><?php echo $value->name ?></option>
											<?php } else { ?>
												<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
											<?php } ?>
										<?php } ?>
									<?php else: ?>
										<?php foreach ($sidebar_frame as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
										<?php } ?>	
									<?php endif ?>
								</select>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="status" <?php echo ($status>0)?'checked="checked"':''; ?> > Bileşen gösterilsin mi?</label>
                                </div>
                            </div>
							<div class="form-group">
								<label>Bileşen Başlık</label>
								<input type="text" class="form-control" name="title" value="<?php echo (isset($title))?$title:''; ?>" />
							</div>
							<div class="form-group">
								<label>Bileşen İçerik</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($content))?$content:''; ?></textarea>
							</div>
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<button type="submit" class="btn btn-default">Bileşen Güncelle</button>
							<a href="backend/sidebar" type="submit" class="btn btn-default">Vazgeç</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    CKEDITOR.replace( 'content' );
</script>