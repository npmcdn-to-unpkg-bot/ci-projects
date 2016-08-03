<ul>
<?php foreach ($categories as $key => $value) { ?>
<li class="cat_<?php echo $value->id ?>"><a href="<?php echo ($value->perma_active)?$value->perma_link:$value->cat_link; ?>" title="<?php echo $value->description ?>"><?php echo $value->name ?></a>
<?php if (isset($value->childs)) { echo "<ul class='submenu'>"; foreach ($value->childs as $key2 => $value2) { ?>
<li class="cat_<?php echo $value2->id ?>"><a href="<?php echo ($value2->perma_active)?$value2->perma_link:$value2->cat_link; ?>" title="<?php echo $value2->description ?>"><?php echo $value2->name ?></a>
<?php if (isset($value2->childs)) { echo "<ul class='submenu2'>"; foreach ($value2->childs as $key3 => $value3) { ?>
<li class="cat_<?php echo $value3->id ?>"><a href="<?php echo ($value3->perma_active)?$value3->perma_link:$value3->cat_link; ?>" title="<?php echo $value3->description ?>"><?php echo $value3->name ?></a></li>
<?php } echo "</ul>"; } ?>
</li>
<?php } echo "</ul>"; } ?>
</li>
<?php } ?>
</ul>