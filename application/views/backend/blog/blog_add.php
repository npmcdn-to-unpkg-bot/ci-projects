<script src="assets/admin/dist/js/lib/ckeditor.js"></script>
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
					<form action="" enctype="multipart/form-data" method="post">
						<div class="col-lg-12">
							<?php echo validation_errors('<p style="color:#dc0001;">'); ?>
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#blog" data-toggle="tab">İçerik Sayfası</a></li>
								<li><a href="#blog_list" data-toggle="tab">İçerik Listeleme</a></li>
								<li><a href="#blog_seo" data-toggle="tab">İçerik SEO</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content tab-content-margin-top">
								<div class="tab-pane fade in active" id="blog">
									<div class="form-group">
										<label>İçerik Türü</label><a href="javascript:;" onclick="pages_type()" class="pull-right">İçerik türü ekle <i class="fa fa-plus"></i></a>
										<select name="pages_type" id="pages_type" class="form-control">
											<?php foreach ($blog_groupby as $key => $value): ?>
												<option value="<?php echo $value->pages_type ?>"><?php echo $value->pages_type ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="quick_link" checked="checked"> hızlı menü aktif olsun mu?</label>
                                        </div>
                                    </div>
									<div class="form-group">
										<label>İçerik Başlık</label>
										<input type="text" class="form-control" name="title" value="<?php echo (isset($title))?$title:''; ?>" />
									</div>
									<div class="form-group">
										<label>İçerik</label>
										<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($content))?$content:''; ?></textarea>
									</div>
								</div>
								<div class="tab-pane fade" id="blog_list">
									<div class="form-group">
										<label>Listeleme Başlık</label>
										<input type="text" class="form-control" name="list_title" value="<?php echo (isset($list_title))?$list_title:''; ?>" />
									</div>
									<div class="form-group">
										<label>Listeleme İçerik</label>
										<textarea name="list_content" id="list_content" class="form-control" cols="30" rows="10"><?php echo (isset($list_content))?$list_content:''; ?></textarea>
									</div>
									<div class="form-group">
										<label>Listeleme Resim</label>
                                        <input type="file" name="list_image" accept="image/*" />
									</div>
								</div>
								<div class="tab-pane fade" id="blog_seo">
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
								</div>
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
    CKEDITOR.replace( 'list_content' );
	function pages_type() {
		var pages_type = prompt("İçerik türü ekleyiniz");

		if (pages_type.length > 0) {
			$('#pages_type').append('<option value="'+pages_type+'">'+pages_type+'</option>');
		}
	}
</script>