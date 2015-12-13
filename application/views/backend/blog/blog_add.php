<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">İçerik Ekle</h1>
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
								<label>İçerik Başlık</label>
								<input type="text" class="form-control" name="title" value="<?php echo (isset($title))?$title:''; ?>" />
							</div>
							<div class="form-group">
								<label>İçerik</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($content))?$content:''; ?></textarea>
							</div>
							<div class="form-group">
								<label>İçerik Meta Description</label>
								<input type="text" class="form-control" name="meta_description" value="<?php echo (isset($meta_description))?$meta_description:''; ?>" />
							</div>
							<div class="form-group">
								<label>İçerik Meta Keyword</label>
								<input type="text" class="form-control" name="meta_keyword" value="<?php echo (isset($meta_keyword))?$meta_keyword:''; ?>" />
							</div>
							<div class="form-group">
								<label>İçerik Meta Title</label>
								<input type="text" class="form-control" name="meta_title" value="<?php echo (isset($meta_title))?$meta_title:''; ?>" />
							</div>
							<button type="submit" class="btn btn-default">İçerik Ekle</button>
							<a href="backend/blog" type="submit" class="btn btn-default">Vazgeç</a>
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