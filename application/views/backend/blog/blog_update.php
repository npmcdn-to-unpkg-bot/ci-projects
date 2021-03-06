<script src="assets/admin/dist/js/lib/ckeditor.js"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">İçerik Güncelle</h1>
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
							<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
							<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
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
												<?php if ($value->pages_type == $data[0]->pages_type): ?>
													<option value="<?php echo $value->pages_type ?>" selected><?php echo $value->pages_type ?></option>
												<?php else: ?>
													<option value="<?php echo $value->pages_type ?>"><?php echo $value->pages_type ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="quick_link" <?php echo ($data[0]->quick_link==1)? "checked":""; ?>> hızlı menü aktif olsun mu?</label>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="blog_comments_enable" <?php echo ($data[0]->blog_comments_enable==1)? "checked":""; ?>> bloga yorum yapılabilsin mi?</label>
                                        </div>
                                    </div>
									<div class="form-group">
										<label>İçerik Başlık</label>
										<input type="text" class="form-control" name="title" value="<?php echo (isset($data[0]->title))?$data[0]->title:''; ?>" />
									</div>
									<div class="form-group">
										<label>İçerik</label>
										<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo (isset($data[0]->content))?$data[0]->content:''; ?></textarea>
									</div>
								</div>
								<div class="tab-pane fade" id="blog_list">
									<div class="form-group">
										<label>Listeleme Başlık</label>
										<input type="text" class="form-control" name="list_title" value="<?php echo (isset($data[0]->list_title))?$data[0]->list_title:''; ?>" />
									</div>
									<div class="form-group">
										<label>Listeleme İçerik</label>
										<textarea name="list_content" id="list_content" class="form-control" cols="30" rows="10"><?php echo (isset($data[0]->list_content))?$data[0]->list_content:''; ?></textarea>
									</div>
									<div class="form-group">
										<label>Listeleme Resim</label>
                                        <?php if(!empty($data[0]->list_image) && $data[0]->list_image != 'list_image'){ ?>
                                            <img src="<?php echo $data[0]->list_image ?>" width="50" height="50" style="display:block;"/>
                                            <div class="checkbox"><label><input type="checkbox" name="delete_list_image" value="<?php echo $data[0]->list_image ?>"> Sil</label></div>
                                        <?php } ?>
                                        <input type="file" name="list_image" accept="image/*" />
                                        <input type="hidden" name="old_list_image" value="<?php echo $data[0]->list_image ?>"/>
									</div>
								</div>
								<div class="tab-pane fade" id="blog_seo">
									<div class="form-group">
										<label>İçerik linki</label>
										<input type="text" class="form-control" name="pages_link" value="<?php echo (isset($data[0]->pages_link))?$data[0]->pages_link:''; ?>" disabled/>
									</div>
									<div class="form-group">
										<label>İçerik Perma linki</label>
										<p class="pull-right"><input type="checkbox" value="1" name="perma_active" <?php echo ($data[0]->perma_active==1)? "checked":""; ?>> permalink kullanılsın mı?</p>
										<input type="text" class="form-control" name="perma_link" value="<?php echo (isset($data[0]->perma_link))?$data[0]->perma_link:''; ?>" />
									</div>
									<div class="form-group">
										<label>İçerik Meta Description</label>
										<input type="text" class="form-control" name="meta_description" value="<?php echo (isset($data[0]->meta_description))?$data[0]->meta_description:''; ?>" />
									</div>
									<div class="form-group">
										<label>İçerik Meta Keyword</label>
										<input type="text" class="form-control" name="meta_keyword" value="<?php echo (isset($data[0]->meta_keyword))?$data[0]->meta_keyword:''; ?>" />
									</div>
									<div class="form-group">
										<label>İçerik Meta Title</label>
										<input type="text" class="form-control" name="meta_title" value="<?php echo (isset($data[0]->meta_title))?$data[0]->meta_title:''; ?>" />
									</div>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
							<button type="submit" class="btn btn-default">İçerik Güncelle</button>
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
</script>