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
					<div class="col-lg-12 categoriesListing">
                        <a href="javascript:;" data-toggle="modal" data-target="#categoriesAdd" rel="0" class="modalCategoriesAdd">Ana Kategori</a>
                        <ul id="browser" class="filetree">
                            <li>
                                <span class="folder">
                                    <a href="">Folder 1</a> 
                                    <a href="javascript:;" data-toggle="modal" data-target="#categoriesAdd" class="fa fa-plus fa-fw modalCategoriesAdd" rel="x"></a> 
                                    <a href="javascript:;" data-toggle="modal" data-target="#categoriesDelete" class="fa fa-trash fa-fw modalCategoriesDelete" rel="x"></a>
                                    <a href="javascript:;" class="fa fa-external-link fa-fw categoriesLinker" rel="x"></a>
                                </span>
                                <ul>
                                    <li><span class="file">File 1.1</span></li>
                                    <li><span class="file">File 1.2</span></li>
                                </ul>
                            </li>
                            <li>
                                <span class="folder"><a href="">Folder 2</a></span>
                                <ul>
                                    <li><span class="file">File 2.1</span></li>
                                    <li><span class="file">File 2.2</span></li>
                                </ul>
                            </li>
                            <li class="closed">
                                <span class="folder"><a href="">Folder 3 (closed at start)</a></span>
                                <ul>
                                    <li><span class="file">File 3.1</span></li>
                                </ul>
                            </li>
                        </ul>
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
        $('input[name="parent_id"].cat_parent_id').attr('value',rel);
        // kategori eklemede db'ye bakarak alanları yerleştir ve relden aldıgın idyi uygun yerlere ver
    });
    $('.modalCategoriesDelete').on('click', function(){
        var rel = $(this).attr('rel');
        // kategori id ve adini alip modalda goster sonra kategoriyi sil.
    });
    $('.categoriesLinker').on('click', function(){
        var rel = $(this).attr('rel');
        // bu işlem kalsın frontend kismi yapilinca yapiplsin.
    });
});
</script>
<!-- Modal Categories Add -->
<div class="modal fade" id="categoriesAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/categories/categoriesAdd" method="post">
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
                                    <div class="tab-pane fade in active" id="settings01">
                                        <div class="form-group">
                                            <label>Kategori Adı</label>
                                            <input type="text" name="name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Açıklama</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Hangi Kategoriden Sonra</label>
                                            <input type="text" name="queue" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Liste Düzeni</label>
                                            <input type="text" name="list_layout" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="status" /> Kategori Aktif mi?</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="parent_id" class="cat_parent_id" />
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
                                            <textarea name="meta_title" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <textarea name="meta_keyword" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Kategori Sil</h4>
            </div>
            <div class="modal-body">
                xxx isimli kategorinizi silmek istiyor musunuz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                <button type="button" class="btn btn-danger">Sil</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->