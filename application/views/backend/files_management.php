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
                    <?php foreach ($breadcrumb as $key => $value) { ?>
                        / <a href="<?php echo 'backend/files_management?dir='.$value->crumb; ?>"><?php echo ($value->bread=='uploads')?'~Kök':$value->bread; ?></a>
                    <?php } ?>
                </h4>
            </div>
			<div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
                        <div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <form action="backend/files_management/folders_add" method="post" accept-charset="utf-8">
                                <label>Klasör Oluştur</label>
                                <input class="form-control" name="folder" type="text">
                                <input class="form-control" name="relative_path" type="hidden" value="<?php echo $relative_path; ?>">
                                <input type="submit" value="Ekle" class="btn btn-outline btn-success pull-right" style="margin-top:5px;">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <form action="backend/files_management/files_add" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <label>Dosya Yükle</label>
                                <input type="file" name="file" />
                                <input class="form-control" name="relative_path" type="hidden" value="<?php echo $relative_path; ?>">
                                <input type="submit" value="Yükle" class="btn btn-outline btn-primary pull-right" style="margin-top:5px;">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <form action="backend/files_management/files_multiple_add" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <label>Çoklu Dosya Yükle</label>
                                <input type="file" name="file[]" multiple="multiple" />
                                <input class="form-control" name="relative_path" type="hidden" value="<?php echo $relative_path; ?>">
                                <input type="submit" value="Yükle" class="btn btn-outline btn-primary pull-right" style="margin-top:5px;">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-9">
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
                                        <td><a href="<?php echo 'backend/files_management/folders_delete?dir='.$value->server_path.'&relative_path='.$value->relative_path; ?>"> sil </a></td>
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
                                        <td><a href="<?php echo 'backend/files_management/files_delete?file='.$value->server_path.'&relative_path='.$value->relative_path; ?>"> sil </a></td>
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