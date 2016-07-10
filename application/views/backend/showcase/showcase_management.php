<script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
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
					<div class="col-lg-12">
						<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
						<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
						<div class="form-group">
							<a href="javascript:;" class="btn btn-outline btn-danger showcase-queue">Sıralamayı Kaydet</a>
							<a href="backend/showcase/showcase_add" class="btn btn-outline btn-warning">Vitrin Ekle</a>							
						</div>
						<div class="form-group">
							<div id="filters" class="button-group">
								<button class="btn btn-outline btn-default btn-primary showcase-show-all" data-filter="*">Hepsini Göster</button>
								<?php foreach ($showcase_to_categories as $key => $value): ?>
									<button class="btn btn-outline btn-default" data-filter=".cat_<?php echo $value->id; ?>"><?php echo $value->name; ?></button>
								<?php endforeach ?>
							</div>
						</div>
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul id="draggablePanelList" class="list-unstyled isotope-grid">
								<?php foreach ($showcase_list as $key => $value) { ?>
									<li class="panel panel-info <?php foreach ($value->showcase_to_categories as $stc_key => $stc_value) {
										echo "cat_".$stc_value->categories_id." ";
									} ?>" rel="<?php echo $value->id; ?>">
										<div class="panel-heading"><?php echo $value->title ?></div>
										<div class="panel-body">
											<a href="backend/showcase/blog_to_showcase/<?php echo $value->id ?>">Vitrine Blog Ekle </a>
											<span class="pull-right">
												<a href="backend/showcase/showcase_update/<?php echo $value->id ?>">Güncelle</a>
												<a href="javascript:;" data-toggle="modal" data-target="#showcase_delete" class="modal_showcase_delete" rel="<?php echo $value->id ?>"><span rel="<?php echo $value->title ?>">Sil</span></a>
											</span>
										</div>
									</li>
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
	var panelList = $('#draggablePanelList');
	panelList.sortable({
		handle: '.panel-heading'
	});
	// init Isotope
	var $grid = $('.isotope-grid').isotope({
		itemSelector: '.panel',
		layoutMode: 'vertical',
		getSortData: {
			name: '.panel-heading'
		}
	});
	// bind filter button click
	$('#filters').on( 'click', 'button', function() {
		var filterValue = $( this ).attr('data-filter');
		// use filterFn if matches value
		$grid.isotope({ filter: filterValue });
	});
	// change is-checked class on buttons
	$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.btn-primary').removeClass('btn-primary');
			$(this).addClass('btn-primary');
			if($(this).hasClass('showcase-show-all')) {
				$('.showcase-queue').show();
			} else {
				$('.showcase-queue').hide();
			}
		});
	});
	$('.panel').attr('style','');
	$('.showcase-queue').on('click', function(){
		$('.panel').each(function(index, elem) {
			newIndex = $(elem).index()+1;
			listId = $(elem).attr('rel');
			// console.log('newIndex:'+newIndex+'listId:'+listId);
			$.post('backend/showcase/showcase_move',{id:listId,queue:newIndex},function(o){
				// console.log(o);
			});
		});
	});
	$('.modal_showcase_delete').on('click', function(){
        var rel = $(this).attr('rel');
        var showcase_delete_name = $('span',this).attr('rel');
        $('#showcase_delete input[name="id"].showcase_id').attr('value',rel);
        $('#showcase_delete #showcase_delete_name').text('"'+showcase_delete_name+'"');
    });
</script>
<style>
	.panel-heading {cursor:move;}
</style>