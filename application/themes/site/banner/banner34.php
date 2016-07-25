<div class="col-lg-4">
<div class="site-swiper-banner swiper-container">
	<div class="swiper-wrapper">
	<?php foreach ($banner as $banner_key => $banner_value): ?>
		<div class="swiper-slide"><a href="<?php echo $banner_value->link ?>" title="<?php echo $banner_value->alt_text ?>"><img src="<?php echo $banner_value->image ?>" alt="<?php echo $banner_value->alt_text ?>" /></a></div>
	<?php endforeach ?>
	</div>
<!-- Add Pagination -->
<div class="swiper-pagination sp-banner"></div>
</div>
</div>