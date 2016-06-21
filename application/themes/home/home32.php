<section>
<div class="container">
<div class="col-lg-12" id="slider_container s"><?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?></div>
<?php if (isset($sidebar_leftbar)) { require(APPPATH.$sidebar_leftbar[0]->file_path); } ?>
<div class="col-lg-8" id="center_container c"><?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?><?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?></div>
<?php if (isset($sidebar_rightbar)) { require(APPPATH.$sidebar_rightbar[0]->file_path); } ?>
</div>
</section>