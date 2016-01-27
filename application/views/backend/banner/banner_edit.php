<link rel="stylesheet" href="assets/admin/dist/css/jquery.treeview.css" />
<script src="assets/admin/dist/js/lib/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/admin/dist/js/jquery.treeview.js" type="text/javascript"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Banner Düzenle</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-10 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul id="draggablePanelList" class="list-unstyled">
								<li class="panel panel-info">
									<div class="panel-heading">başlık</div>
									<div class="panel-body">
										<span class="pull-right">
											<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
										</span>
									</div>
								</li>
								<li class="panel panel-info">
									<div class="panel-heading">başlık</div>
									<div class="panel-body">
										<span class="pull-right">
											<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
										</span>
									</div>
								</li>
								<li class="panel panel-info">
									<div class="panel-heading">başlık</div>
									<div class="panel-body">
										<span class="pull-right">
											<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
										</span>
									</div>
								</li>
							</ul>
						</div>
						<div class="form-group">
							<a href="javascript:;" data-toggle="modal" data-target="#banner_add" class="btn btn-outline btn-warning" rel="0">Banner Ekle</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var panelList = $('#draggablePanelList');
	panelList.sortable({
		// Only make the .panel-heading child elements support dragging.
		// Omit this to make then entire <li>...</li> draggable.
		handle: '.panel-heading', 
		update: function() {
			$('.panel', panelList).each(function(index, elem) {
				var $listItem = $(elem),
				newIndex = $listItem.index();
				// Persist the new indices.
			});
		}
	});
</script>
<!-- Modal Categories Add -->
<div class="modal fade" id="banner_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/banner_management/banner_add" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Banner Ekle</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                        	<div class="form-group">
                                <label>Resim</label>
                                <input type="file" name="image" accept="image/*" />
                            </div>
                            <div class="form-group">
                                <label>Alt Text</label>
                                <input type="text" name="alt_text" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control" value="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="target" value="<?php echo $target ?>" />
                    <input type="hidden" name="banner_type" value="<?php echo $banner_type ?>" />
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