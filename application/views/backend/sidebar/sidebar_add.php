<script src="assets/admin/dist/js/lib/ckeditor.js"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sağ / Sol Bileşen Ekle</h1>
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
                                <div class="radio">
                                    <label><input type="radio" name="which_side" value="left" <?php echo (isset($which_side) && $which_side == 'left')?'checked="checked"':''; ?> checked> Sol</label>
                                    <label><input type="radio" name="which_side" value="right" <?php echo (isset($which_side) && $which_side == 'right')?'checked="checked"':''; ?> > Sağ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="status" checked="checked"> Bileşen gösterilsin mi?</label>
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
							<button type="submit" class="btn btn-default">Bileşen Ekle</button>
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