<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">İçerik Yönetimi</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-10 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
						<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
						<div class="form-group">
							<label>İçerik Seçiniz</label>
							<select name="blog_management" id="blog_management" class="form-control">
								<option value="0">Seçiniz</option>
								<?php foreach ($data as $key => $value) { ?>
									<option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
								<?php } ?>
							</select>
						</div>
						<a href="javascript:;" class="btn btn-default btn-outline blog_update">İçerik Güncelle</a>
						<a href="javascript:;" class="btn btn-outline btn-danger blog_delete">İçerik Sil</a>
						<a href="backend/blog/blog_add" class="btn btn-outline btn-warning">İçerik Ekle</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#blog_management').on('change',function(){
		$('.blog_update').attr('href','backend/blog/blog_update/'+$(this).val());
		$('.blog_delete').attr('href','backend/blog/blog_delete/'+$(this).val());
		if ($(this).val() ==  0) {
			$('.blog_update').attr('href','javascript:;');
			$('.blog_delete').attr('href','javascript:;');
		}
	});
</script>