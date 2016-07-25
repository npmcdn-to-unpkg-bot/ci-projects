<div class="site_slider">
 <ul>
 <?php foreach ($slider as $slider_key => $slider_value): ?>
  <li><a href="<?php echo $slider_value->link ?>" title="<?php echo $slider_value->alt_text ?>"><img src="<?php echo $slider_value->image ?>" alt="<?php echo $slider_value->alt_text ?>" height="500"/></a></li>
 <?php endforeach ?>
 </ul>
</div>