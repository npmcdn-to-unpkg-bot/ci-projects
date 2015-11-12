<link rel="stylesheet" href="assets/admin/dist/css/jquery.treeview.css" />
<script src="assets/admin/dist/js/lib/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/admin/dist/js/jquery.treeview.js" type="text/javascript"></script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kategori Ayarları</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
                    <?php 
                        if ( $this->session->flashdata('add_stream_errors') != null ) {
                            echo '<span class="'.$this->session->flashdata('add_stream_errors').'"></span>';
                        }
                    ?>
					<div class="col-lg-12 categoriesListing">
                        <span>
                            <a href="javascript:;" data-toggle="modal" data-target="#categoriesUpdate" rel="0" class="modalCategoriesUpdate">Ana Kategori</a>
                            <a href="javascript:;" data-toggle="modal" data-target="#categoriesAdd" class="fa fa-plus fa-fw modalCategoriesAdd" rel="0"></a> 
                        </span>
                        <?php  echo $category; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
    $('.modalCategoriesAdd').on('click', function(){
        var rel = $(this).attr('rel');
        $('#categoriesAdd input[name="parent_id"].cat_parent_id').attr('value',rel);
        // kategori eklemede db'ye bakarak alanları yerleştir ve relden aldıgın idyi uygun yerlere ver
    });
    $('.modalCategoriesUpdate').on('click', function(){
        var rel = $(this).attr('rel');
        // $('#categoriesAdd input[name="parent_id"].cat_parent_id').attr('value',rel);
        // kategori eklemede db'ye bakarak alanları yerleştir ve relden aldıgın idyi uygun yerlere ver
    });
    $('.modalCategoriesDelete').on('click', function(){
        var rel = $(this).attr('rel');
        var catDeleteName = $('span',this).attr('rel');
        $('#categoriesDelete input[name="id"].cat_id').attr('value',rel);
        $('#categoriesDelete #catDeleteName').text('"'+catDeleteName+'"');
        // kategori id ve adini alip modalda goster sonra kategoriyi sil.
    });
    $('.categoriesLinker').on('click', function(){
        var rel = $(this).attr('rel');
        $(this).parent().find('>code.cat_link').toggle();
        // bu işlem kalsın frontend kismi yapilinca yapiplsin.
    });
    if ($('span').hasClass('add_stream_errors')) {
        $('#categoriesAdd').modal('show');
    }
});
</script>
<!-- Modal Categories Add -->
<div class="modal fade" id="categoriesAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/categories/categoriesAdd" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Kategori Ekle</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs categories-tabs">
                                    <li class="active"><a href="#settings01" data-toggle="tab">Genel Ayarları</a></li>
                                    <li><a href="#settings02" data-toggle="tab">Görsel Ayarlar</a></li>
                                    <li><a href="#settings03" data-toggle="tab">SEO Ayarları</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content categories-tabs">
                                <?php 
                                    echo validation_errors('<p style="color:#dc0001;">'); 
                                    if(isset($image_errors)) {
                                        echo $image_errors;
                                    }
                                ?>
                                    <div class="tab-pane fade in active" id="settings01">
                                        <div class="form-group">
                                            <label>Kategori Adı</label>
                                            <input type="text" name="name" class="form-control" value="<?php if(isset($add_stream_name)){echo $add_stream_name;} ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Açıklama</label>
                                            <textarea name="description" class="form-control"><?php if(isset($add_stream_description)){echo $add_stream_description;} ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Sırası</label>
                                            <input type="text" name="queue" class="form-control" value="<?php if(isset($add_stream_queue)){echo $add_stream_queue;} ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Listeleme Düzeni</label>
                                            <input type="text" name="list_layout" class="form-control" value="<?php if(isset($add_stream_list_layout)){echo $add_stream_list_layout;} ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="status" <?php if(isset($add_stream_status)){echo 'checked="checked"';}else{echo '';} ?> /> Kategori Aktif mi?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="settings02">
                                        <div class="form-group">
                                            <label>Kategori Resim</label>
                                            <input type="file" name="image" accept="image/*" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Banner</label>
                                            <input type="file" name="banner" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="settings03">
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <textarea name="meta_title" class="form-control"><?php if(isset($add_stream_meta_title)){echo $add_stream_meta_title;} ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" class="form-control"><?php if(isset($add_stream_meta_description)){echo $add_stream_meta_description;} ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <textarea name="meta_keyword" class="form-control"><?php if(isset($add_stream_meta_keyword)){echo $add_stream_meta_keyword;} ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="parent_id" class="cat_parent_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Categories Delete -->
<div class="modal fade" id="categoriesDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/categories/categoriesDelete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Kategori Sil</h4>
                </div>
                <div class="modal-body">
                    <span id="catDeleteName"></span> isimli kategorinizi silmek istiyor musunuz?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="cat_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-danger">Sil</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->