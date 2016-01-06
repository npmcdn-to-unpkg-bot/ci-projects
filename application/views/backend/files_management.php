<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dosya Yöneticisi</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4>
                    <a href="backend/files_management">~kök</a>
                </h4>
            </div>
			<div class="panel-body">
				<div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Klasör Adı</th>
                                        <th>klasör Yolu</th>
                                        <th>klasör Sil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $counts=1; foreach ($folders as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $counts; ?></td>
                                        <td><a href="<?php echo 'backend/files_management?dir='.$value->server_path; ?>"> <?php echo $value->name; ?> </a></td>
                                        <td><code class="cat_link"><?php echo $value->server_path; ?></code></td>
                                        <td>sil</td>
                                    </tr>
                                <?php $counts++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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
                                <?php $counts=1; foreach ($files as $key => $value) {  ?>
                                    <tr>
                                        <td><?php echo $counts; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->server_path; ?></td>
                                        <td>sil</td>
                                    </tr>
                                <?php $counts++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>