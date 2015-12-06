<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Site Genel Ayarlar</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 info-center">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <?php echo validation_errors('<p style="color:#dc0001;">'); ?>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs vertical-tabs col-lg-2">
                                <li class="active"><a href="#settings01" data-toggle="tab">&lthead&gt Kodları</a></li>
                                <li><a href="#settings02" data-toggle="tab">&lt/body&gt Bitiminden Önce</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content col-lg-10">
                                <div class="tab-pane fade in active" id="settings01">
                                    <div class="form-group">
                                        <label>&lthead&gt Kodları</label>
                                        <textarea class="form-control" name="custom_head_code" rows="10"><?php echo ( isset($custom_head_code) ) ?  $custom_head_code : '' ; ?></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings02">
                                    <div class="form-group">
                                        <label>&lt/body&gt Bitiminden Önce</label>
                                        <textarea class="form-control" name="custom_foot_code" rows="10"><?php echo ( isset($custom_foot_code) ) ? $custom_foot_code : '' ; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-10 pull-right site_settings_save">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>