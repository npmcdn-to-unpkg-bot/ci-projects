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
					<div class="col-lg-12">
                        <a href="javascript:;" data-toggle="modal" data-target="#categoryAdd">Ana Kategori</a>
                        <ul id="browser" class="filetree">
                            <li>
                                <span class="folder"><a href="">Folder 1</a></span>
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
<!-- Modal -->
<div class="modal fade" id="categoryAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Kategori Ekle</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->