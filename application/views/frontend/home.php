<div class="col-lg-8" id="center_container">
	<?php foreach ($showcase as $showcase_key => $showcase_value): ?>
		<?php include(APPPATH.$showcase_value->file_path); ?>
	<?php endforeach ?>
</div>




