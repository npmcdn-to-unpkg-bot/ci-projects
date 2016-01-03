<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sağ / Sol Bileşen Yönetimi</h1>
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
						<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
						<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<a href="backend/sidebar/sidebar_add" class="btn btn-outline btn-warning">Sağ / Sol Bileşen Ekle</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul class="list-unstyled draggablePanelList leftPanelList">

								<?php foreach ($sidebar as $key => $value) { ?>
									<?php if ($value->which_side == 'left'): ?>
										<li class="panel panel-info" rel="<?php echo $value->id; ?>">
											<div class="panel-heading"><?php echo $value->title; ?></div>
											<div class="panel-body">
												<span class="pull-right">
													<a href="backend/sidebar/sidebar_update/<?php echo $value->id; ?>">Güncelle</a>
													<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel="<?php echo $value->id; ?>"><span rel="<?php echo $value->title; ?>">Sil</span></a>
												</span>
											</div>
										</li>
									<?php endif ?>
								<?php } ?>

							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul class="list-unstyled draggablePanelList rightPanelList">

								<?php foreach ($sidebar as $key => $value) { ?>
									<?php if ($value->which_side == 'right'): ?>
										<li class="panel panel-info" rel="<?php echo $value->id; ?>">
											<div class="panel-heading"><?php echo $value->title; ?></div>
											<div class="panel-body">
												<span class="pull-right">
													<a href="backend/sidebar/sidebar_update/<?php echo $value->id; ?>">Güncelle</a>
													<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel="<?php echo $value->id; ?>"><span rel="<?php echo $value->title; ?>">Sil</span></a>
												</span>
											</div>
										</li>
									<?php endif ?>
								<?php } ?>

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
            <form action="backend/sidebar/sidebar_delete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Vitrin Sil</h4>
                </div>
                <div class="modal-body">
                    <span id="showcase_delete_name"></span> isimli kategorinizi silmek istiyor musunuz?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="sidebar_id" />
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
	$('.draggablePanelList').sortable({
		handle: '.panel-heading',
		placeholder: 'highlight',
		connectWith: '.draggablePanelList',
		stop: function() {
			$('.leftPanelList .panel').each(function(index, elem) {
				newIndex = $(elem).index()+1;
				listId = $(elem).attr('rel');
				// console.log('Sol - newIndex:'+newIndex+', listId:'+listId);
				$.post('backend/sidebar/sidebar_move',{id:listId,queue:newIndex,which_side:'left'},function(o){
					// console.log(o);
				});
			});
			$('.rightPanelList .panel').each(function(index, elem) {
				newIndex = $(elem).index()+1;
				listId = $(elem).attr('rel');
				// console.log('Sağ - newIndex:'+newIndex+', listId:'+listId);
				$.post('backend/sidebar/sidebar_move',{id:listId,queue:newIndex,which_side:'right'},function(o){
					// console.log(o);
				});
			});
		}
	});
	$('.modal_showcase_delete').on('click', function(){
        var rel = $(this).attr('rel');
        var showcase_delete_name = $('span',this).attr('rel');
        $('#showcase_delete input[name="id"].sidebar_id').attr('value',rel);
        $('#showcase_delete #showcase_delete_name').text('"'+showcase_delete_name+'"');
    });
</script>