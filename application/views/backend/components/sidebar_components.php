<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Vitrin Yönetimi</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-10 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
					<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
					<div class="col-lg-12">
						<div class="form-group">
							<a href="backend" class="btn btn-outline btn-warning">Vitrin Ekle</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul id="draggablePanelList" class="list-unstyled draggablePanelList">

									<li class="panel panel-info">
										<div class="panel-heading">baslik</div>
										<div class="panel-body">
											<a href="backend">Vitrine Blog Ekle </a>
											<span class="pull-right">
												<a href="backend">Güncelle</a>
												<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
											</span>
										</div>
									</li>

									<li class="panel panel-info">
										<div class="panel-heading">baslik</div>
										<div class="panel-body">
											<a href="backend">Vitrine Blog Ekle </a>
											<span class="pull-right">
												<a href="backend">Güncelle</a>
												<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
											</span>
										</div>
									</li>

									<li class="panel panel-info">
										<div class="panel-heading">baslik</div>
										<div class="panel-body">
											<a href="backend">Vitrine Blog Ekle </a>
											<span class="pull-right">
												<a href="backend">Güncelle</a>
												<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
											</span>
										</div>
									</li>

							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul id="draggablePanelList" class="list-unstyled draggablePanelList">

									<li class="panel panel-info">
										<div class="panel-heading">baslik</div>
										<div class="panel-body">
											<a href="backend">Vitrine Blog Ekle </a>
											<span class="pull-right">
												<a href="backend">Güncelle</a>
												<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
											</span>
										</div>
									</li>

									<li class="panel panel-info">
										<div class="panel-heading">baslik</div>
										<div class="panel-body">
											<a href="backend">Vitrine Blog Ekle </a>
											<span class="pull-right">
												<a href="backend">Güncelle</a>
												<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel=""><span rel="">Sil</span></a>
											</span>
										</div>
									</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Categories Delete -->
<div class="modal fade" id="showcase_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/showcase/showcase_delete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Vitrin Sil</h4>
                </div>
                <div class="modal-body">
                    <span id="showcase_delete_name"></span> isimli kategorinizi silmek istiyor musunuz?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="showcase_id" />
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
<script>
	var panelList = $('.draggablePanelList');
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
	$('.modal_showcase_delete').on('click', function(){
        var rel = $(this).attr('rel');
        var showcase_delete_name = $('span',this).attr('rel');
        $('#showcase_delete input[name="id"].showcase_id').attr('value',rel);
        $('#showcase_delete #showcase_delete_name').text('"'+showcase_delete_name+'"');
    });
</script>