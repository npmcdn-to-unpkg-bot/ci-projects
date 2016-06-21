<div class="col-lg-2" id="left_container l"><div class="row">
<?php if (isset($leftbar)) { foreach($leftbar as $sidebar_key => $sidebar_value) {include(APPPATH.$sidebar_value->file_path);} } ?>
</div></div>