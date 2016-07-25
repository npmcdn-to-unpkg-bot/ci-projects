<section>
<div class="container">
<?php if (isset($sidebar_leftbar)) { require(APPPATH.$sidebar_leftbar[0]->file_path); } ?>
<div class="col-lg-10" id="center_container c">
<div class="col-lg-3" id="quicklink_container q">
<ul>
<?php foreach ($blog_qlink as $key => $qlink) { ?>
<li rel="<?php echo $qlink->id ?>"><a href="<?php echo $qlink->pages_link ?>"><?php echo $qlink->title ?></a></li>
<?php } ?>
</ul>
</div>
<div class="col-lg-9" id="blog_container b">
<img src="<?php echo $blog_value->list_image ?>" />
<?php echo $blog_value->title ?>
<?php echo $blog_value->content ?>
</div>
</div>
<?php if (isset($sidebar_rightbar)) { require(APPPATH.$sidebar_rightbar[0]->file_path); } ?>
<div class="col-lg-12" id="vitrin_container v"><?php if (isset($showcase)) { foreach($showcase as $showcase_key => $showcase_value) {include(APPPATH.$showcase_value->file_path);} } ?></div>
</div>
</section>