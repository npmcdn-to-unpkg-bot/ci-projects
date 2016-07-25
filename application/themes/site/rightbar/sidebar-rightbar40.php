<div class="col-lg-2" id="right_container r"><div class="row">
<?php if (isset($rightbar)) { foreach($rightbar as $sidebar_key => $sidebar_value) {include(APPPATH.$sidebar_value->file_path);} } ?>
</div></div>