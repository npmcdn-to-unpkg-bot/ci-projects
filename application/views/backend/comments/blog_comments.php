<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog Yorumları</h1>
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
                        <?php echo validation_errors('<p style="color:#dc0001;">'); ?>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs vertical-tabs col-lg-2">
                            <li class="active"><a href="#settings01" data-toggle="tab">Onay Bekleyen Yorumlar</a></li>
                            <li><a href="#settings02" data-toggle="tab">Onaylı Yorumlar</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content col-lg-10">
                            <div class="tab-pane fade in active" id="settings01">
                                Onay Bekleyen Yorumlar
                            </div>
                            <div class="tab-pane fade" id="settings02">
                               Onaylı Yorumlar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>