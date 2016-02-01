<link rel="stylesheet" href="assets/admin/dist/css/jquery.treeview.css" />
<script src="assets/admin/dist/js/lib/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/admin/dist/js/jquery.treeview.js" type="text/javascript"></script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Banner Yönetimi</h1>
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
						<?php echo validation_errors('<p style="color:#dc0001;">'); ?>
						<form action="backend/banner_management/banner_edit" method="get">
							<div class="form-group">
								<label>Banner Nerede Gösterilsin</label>
								<div class="radio"><label><input type="radio" name="target" value="home" checked="">Anasayfa</label></div>
								<div class="radio categoriesListing">
									<?php echo $banner_listing; ?>
								</div>
							</div>
							<div class="form-group">
								<label>Banner Biçimini Seçiniz</label>
								<div class="radio">
									<label class="radio-inline">
										<input type="radio" name="banner_type" value="slide" checked="">Geçişli Banner
									</label>
									<label class="radio-inline">
										<input type="radio" name="banner_type" value="banner">Banner
									</label>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-outline btn-warning" value="Banner Ekle">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>