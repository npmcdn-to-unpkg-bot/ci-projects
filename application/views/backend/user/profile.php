<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bilgilerim</h1>
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
							echo validation_errors('<p style="color:#dc0001;">');

							if ( $this->session->flashdata('errors') != null ) {
								echo '<p style="color:red;">'.$this->session->flashdata('errors').'</p>';
							} else if ( $this->session->flashdata('success') != null ) {
								echo '<p style="color:green;">'.$this->session->flashdata('success').'</p>';
							}
						?>
						<?php echo form_open('backend/user/profile_edit') ?>
							<div class="form-group">
								<label>Kullanıcı Adı</label>
								<?php echo form_input('username',$username,'class="form-control" disabled'); ?>
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<?php echo form_input('email',$email,'class="form-control"'); ?>
							</div>
							<div class="form-group">
								<label>Ad</label>
								<?php echo form_input('name',$name,'class="form-control"'); ?>
							</div>
							<div class="form-group">
								<label>Soyad</label>
								<?php echo form_input('surname',$surname,'class="form-control"'); ?>
							</div>
							<div class="form-group">
								<label>Cep Telefonu</label>
								<?php echo form_input('gsm',$gsm,'class="form-control"'); ?>
							</div>
							<div class="form-group">
								<label>Telefon</label>
								<?php echo form_input('phone',$phone,'class="form-control"'); ?>
							</div>
							<div class="form-group">
								<label>Telefon 2</label>
								<?php echo form_input('phone2',$phone2,'class="form-control"'); ?>
							</div>
							<div class="form-group">
								<label>Adres</label>
								<?php echo form_input('address',$address,'class="form-control"'); ?>
							</div>
							<?php echo form_submit('submit','Güncelle','class="btn btn-default"'); ?>
						<?php 
							echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->