<div class="col-lg-12 row aktive">
<div class="vitrin_alan">
<div class="vitrin_baslik"><?php echo $showcase_value->title ?></div>
<div class="vitrin_icerik"><?php echo $showcase_value->content ?></div>
<div class="vitrin_blog_alan"><?php foreach ($showcase_value->blog as $blog_key => $blog_value): ?><?php include(APPPATH.$blog_value->file_path); ?><?php endforeach ?></div>
</div>
</div>