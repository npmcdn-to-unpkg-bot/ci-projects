<div class="site_banner">
	<ul>
	<?php foreach ($banner as $banner_key => $banner_value): ?>
		<li><a href="<?php echo $banner_value->link ?>" title="<?php echo $banner_value->alt_text ?>"><img src="<?php echo $banner_value->image ?>" alt="<?php echo $banner_value->alt_text ?>" /></a></li>
	<?php endforeach ?>
	</ul>
</div>