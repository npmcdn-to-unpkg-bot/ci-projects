<div class="col-lg-2">
	<div class="row">
		<?php foreach ($sidebar as $sidebar_key => $sidebar_value): ?>
			<?php include(APPPATH.$sidebar_value->file_path); ?>
		<?php endforeach ?>
	</div>
</div>