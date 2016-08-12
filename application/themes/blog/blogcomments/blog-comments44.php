<div id="blog_comments_list" class="row">
<?php if (isset($blog_comments_value)) { foreach ($blog_comments_value as $blogc_key => $blogc_value) { ?>
	<div class="bcl">
		<div class="bcl top"><?php echo $blogc_value->name ?> <?php echo $blogc_value->surname ?> - <?php echo $blogc_value->email ?> <span class="pull-right"><?php echo $blogc_value->created_time ?></span></div>
		<div class="bcl middle"><?php echo $blogc_value->title ?></div>
		<div class="bcl bottom"><?php echo $blogc_value->content ?></div>
	</div>
<?php } } ?>
</div>
<div id="blog_comments" class="row">
<div class="blog_comments_message"></div>
<?php if(!$this->session->userdata("user")) { ?>
	<div class="col-lg-6">
		<div class="form-group">
			<label>Ad</label>
			<input class="form-control blog_comments_name" name="blog_comments_name">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label>Soyad</label>
			<input class="form-control blog_comments_surname" name="blog_comments_surname">
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<label>E-posta</label>
			<input class="form-control blog_comments_email" name="blog_comments_email">
		</div>
<?php } ?>
		<div class="form-group">
			<label>Yorum başlığı</label>
			<input class="form-control blog_comments_title" name="blog_comments_title">
		</div>
		<div class="form-group">
			<label>Yorum</label>
			<textarea name="blog_comments_content" class="form-control blog_comments_content" rows="5"></textarea>
		</div>
		<a href="javascript:;" onclick="blog_comments()" class="btn btn-default blog_comments_btn">Yorum yap</a>
		<input type="hidden" value="<?php echo $blog_value->id; ?>" name="blog_id">
		<?php if($this->session->userdata("user")) { ?>
<input type="hidden" value="<?php echo $this->session->userdata("user")["id"] ?>" name="user_id">
<input type="hidden" name="blog_comments_name" value="<?php echo $this->session->userdata("user")["name"] ?>">
<input type="hidden" name="blog_comments_surname" value="<?php echo $this->session->userdata("user")["surname"] ?>">
<input type="hidden" name="blog_comments_email" value="<?php echo $this->session->userdata("user")["email"] ?>"> 
		<?php } ?>
	</div>
</div>