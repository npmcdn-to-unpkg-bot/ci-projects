<section>
<div class="container">
<div class="col-lg-2" id="left_container l"><div class="row"><?php if (isset($leftbar)) { foreach($leftbar as $sidebar_key => $sidebar_value) {include(APPPATH.$sidebar_value->file_path);} } ?></div></div>
<div class="col-lg-8" id="center_container c"><?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?><?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?><?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?></div>
<div class="col-lg-2" id="right_container r"><div class="row"><?php if (isset($rightbar)) { foreach($rightbar as $sidebar_key => $sidebar_value) {include(APPPATH.$sidebar_value->file_path);} } ?></div></div>
</div>
<section>