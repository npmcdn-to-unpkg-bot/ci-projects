<div class="blog_list">
<div class="blog_image"><a href="<?php echo ($blog_value->perma_active)?$blog_value->perma_link:$blog_value->pages_link; ?>" title="<?php echo ($blog_value->list_title)? $blog_value->list_title : $blog_value->title ; ?>"><img src="<?php echo $blog_value->list_image ?>" /></a></div>
<div class="blog_title"><a href="<?php echo ($blog_value->perma_active)?$blog_value->perma_link:$blog_value->pages_link; ?>" title="<?php echo ($blog_value->list_title)? $blog_value->list_title : $blog_value->title ; ?>"><?php echo ($blog_value->list_title)? $blog_value->list_title : $blog_value->title ; ?></a></div>
<div class="blog_content"><?php echo ($blog_value->list_content)? $blog_value->list_content : $blog_value->content ;  ?></div>
</div>