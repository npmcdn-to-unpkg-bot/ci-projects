<div class="col-lg-8" id="center_container">
	<?php if (isset($slider)): ?>
	<div class="site_slider">
		<ul>
		<?php foreach ($slider as $slider_key => $slider_value): ?>
			<?php if ($slider_value->link): ?>
				<li><a href="<?php echo $slider_value->link ?>" title="<?php echo $slider_value->alt_text ?>"><img src="<?php echo $slider_value->image ?>" alt="<?php echo $slider_value->alt_text ?>" /></a></li>
			<?php else: ?>
				<li><img src="<?php echo $slider_value->image ?>" alt="<?php echo $slider_value->alt_text ?>" /></li>
			<?php endif ?>
		<?php endforeach ?>
		</ul>
	</div>	
	<?php endif ?>
	
	<?php if (isset($banner)): ?>
	<div class="site_banner">
		<ul>
		<?php foreach ($banner as $banner_key => $banner_value): ?>
			<?php if ($banner_value->link): ?>
				<li><a href="<?php echo $banner_value->link ?>" title="<?php echo $banner_value->alt_text ?>"><img src="<?php echo $banner_value->image ?>" alt="<?php echo $banner_value->alt_text ?>" /></a></li>
			<?php else: ?>
				<li><img src="<?php echo $banner_value->image ?>" alt="<?php echo $banner_value->alt_text ?>" /></li>
			<?php endif ?>
		<?php endforeach ?>
		</ul>
	</div>	
	<?php endif ?>
</div>