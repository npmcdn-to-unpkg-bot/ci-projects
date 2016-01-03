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
							<div class="form-group">
                                <div class="radio">
                                    <label><input type="radio" name="which_side" value="left" <?php echo (isset($data[0]->which_side) && $data[0]->which_side == 'left')?'checked="checked"':''; ?> > Sol</label>
                                    <label><input type="radio" name="which_side" value="right" <?php echo (isset($data[0]->which_side) && $data[0]->which_side == 'right')?'checked="checked"':''; ?> > Sağ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="status" <?php echo ($data[0]->status>0)?'checked="checked"':''; ?> > Bileşen gösterilsin mi?</label>
                                </div>
                            </div>
							<div class="form-group">
								<label>Bileşen Başlık</label>
								<input type="text" class="form-control" name="title" value="<?php echo (isset($data[0]->title))?$data[0]->title:''; ?>" />
							</div>
							<div class="form-group">
								<label>Bileşen İçerik</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($data[0]->content))?$data[0]->content:''; ?></textarea>
							</div>
							<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
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