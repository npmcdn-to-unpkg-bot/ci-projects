<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tema Yönetimi</h1>
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
						<?php 
							if ( $this->session->flashdata('errors') != null ) {
								echo '<p style="color:red;">'.$this->session->flashdata('errors').'</p>';
							}
						?>
						<div class="errors"></div>
						<div class="form-group">
							<label>Temanın Alanı Seçiniz</label>
							<select name="theme" id="themes_area_id" class="form-control">
								<option value="0">Seçiniz</option>
								<?php 
									foreach ($themes as $key => $value) {
								?>
								<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
								<?php } ?>
							</select>
						</div>
						<div id="resultParentThemes"></div>
						<div id="resultThemes"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){
	$('#themes_area_id').on('change',function(){
		$('#resultParentThemes').html("");
		$('#resultThemes').html("");
		if ( $(this).val() == 0 ) {

            return false;
		}
		$.ajax({
			url:"backend/themes/check_if_parent_themes_exists",
			method:"post",
			data:'parent_id='+$(this).val(),
			success:function(result) {
				$('#resultParentThemes').html(result);
			}
		});
	});
});
</script>