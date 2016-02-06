<div class="col-lg-8">
<div class="row">
<div class="site-swiper-slider swiper-container">
<div class="swiper-wrapper">
<?php foreach ($slider as $slider_key => $slider_value): ?>
<div class="swiper-slide"><a href="<?php echo $slider_value->link ?>" title="<?php echo $slider_value->alt_text ?>"><img src="<?php echo $slider_value->image ?>" alt="<?php echo $slider_value->alt_text ?>" /></a></div>
<?php endforeach ?>
</div>
<!-- Add Pagination -->
<div class="swiper-pagination sp-slider"></div>
</div>
</div>
</div>