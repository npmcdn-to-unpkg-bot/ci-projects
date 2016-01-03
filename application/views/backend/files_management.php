<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dosya Yöneticisi</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 info-center">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dosya Adı</th>
                                    <th>Dosya Yolu</th>
                                    <th>Dosya Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($files as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo $value->server_path; ?></td>
                                    <td>sil</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
				</div>
			</div>
		</div>
	</div>
</div>