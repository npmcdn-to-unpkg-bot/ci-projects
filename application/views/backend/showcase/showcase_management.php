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
							<a href="backend/showcase/showcase_add" class="btn btn-outline btn-warning">İçerik Ekle</a>
						</div>
						<div class="form-group">
							<!-- vitrin listelemesi -->
							<ul id="draggablePanelList" class="list-unstyled">
								<?php foreach ($showcase_list as $key => $value) { ?>
									<li class="panel panel-info">
										<div class="panel-heading"><?php echo $value->title ?></div>
										<div class="panel-body">
											
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