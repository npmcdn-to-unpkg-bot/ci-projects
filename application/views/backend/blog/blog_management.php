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
						<a href="javascript:;" data-toggle="modal" data-target="#blog_delete" class="btn btn-outline btn-danger blog_delete"><span>İçerik Sil</span></a>
						<a href="backend/blog/blog_add" class="btn btn-outline btn-warning">İçerik Ekle</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Categories Delete -->
<div class="modal fade" id="blog_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="backend/blog/blog_delete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Vitrin Sil</h4>
                </div>
                <div class="modal-body">
                    <span id="blog_delete_name"></span> isimli kategorinizi silmek istiyor musunuz?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="blog_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-danger">Sil</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$('#blog_management').on('change',function(){
		$('.blog_update').attr('href','backend/blog/blog_update/'+$(this).val());
		$('.blog_delete').attr({
			rel : $(this).val()
		});
		$('.blog_delete span').attr({
			rel : $('#blog_management option:selected').text()
		});
		if ($(this).val() ==  0) {
			$('.blog_update').attr('href','javascript:;');
			$('.blog_delete').attr('href','javascript:;');
		}
	});
	$('.blog_delete').on('click', function(){
        var rel = $(this).attr('rel');
        var blog_delete_name = $('span',this).attr('rel');
        $('#blog_delete input[name="id"].blog_id').attr('value',rel);
        $('#blog_delete #blog_delete_name').text('"'+blog_delete_name+'"');
    });
</script>