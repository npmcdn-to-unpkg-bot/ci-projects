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
								<?php if (empty($banner)): ?>
									Bu alanda hiçbir banner kaydı yoktur.
								<?php else: ?>
									<?php foreach ($banner as $banner_key => $banner_value): ?>
										<li class="panel panel-info" rel="<?php echo $banner_value->id ?>">
											<div class="panel-heading move_"><span class="glyphicon glyphicon-move"></span></div>
											<div class="panel-body">
												<span class="pull-left">
													<img src="<?php echo $banner_value->image ?>" alt="<?php echo $banner_value->alt_text ?>" width="80" height="80">
												</span>
												<span class="pull-left panel-body">
													Alt Text = <?php echo $banner_value->alt_text ?><br>
													link = <?php echo $banner_value->link ?>
												</span>
												<span class="pull-right">
													<a href="javascript:;" data-toggle="modal" data-target="#banner_delete" class="modal_banner_delete" rel="<?php echo $banner_value->id ?>"><span rel="<?php echo $banner_value->image ?>">Sil</span></a>
												</span>
											</div>
										</li>	
									<?php endforeach ?>
								<?php endif ?>
							</ul>
						</div>
						<div class="form-group">
							<a href="javascript:;" data-toggle="modal" data-target="#banner_add" class="btn btn-outline btn-warning" rel="0">Banner Ekle</a>
							<a href="backend/banner_management" class="btn btn-default">Vazgeç</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#draggablePanelList').sortable({
		handle: '.panel-heading',
		placeholder: 'highlight',
		stop: function() {
			$('.panel').each(function(index, elem) {
				newIndex = $(elem).index()+1;
				listId = $(elem).attr('rel');
				console.log('banner - newIndex:'+newIndex+', listId:'+listId);
				$.post('backend/banner_management/banner_move',{id:listId,queue:newIndex},function(o){});
			});
		}
	});
	$('.modal_banner_delete').on('click', function(){
        var rel = $(this).attr('rel');
        var banner_delete_img = $('span',this).attr('rel');
        $('#banner_delete input[name="id"].banner_id').attr('value',rel);
        $('#banner_delete .banner_delete_img').attr('src',banner_delete_img);
        $('.banner_delete_img_input').attr('value',banner_delete_img);
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
<div class="modal fade" id="banner_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/banner_management/banner_delete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Banner Sil</h4>
                </div>
                <div class="modal-body">
                    <img src="" width="120" height="120" class="banner_delete_img"> Banneri silmek istiyor musunuz?
                    <input type="hidden" value="" name="image" class="banner_delete_img_input">
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="banner_id" />
                    <input type="hidden" name="target" value="<?php echo $target ?>" />
                    <input type="hidden" name="banner_type" value="<?php echo $banner_type ?>" />
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