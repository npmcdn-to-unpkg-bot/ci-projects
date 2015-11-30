<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori Güncelleme</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-10 info-center">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="col-lg-12">
                            <?php echo validation_errors('<p style="color:#dc0001;">');  ?>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs categories-tabs">
                                <li class="active"><a href="#settings01" data-toggle="tab">Genel Ayarları</a></li>
                                <li><a href="#settings02" data-toggle="tab">Görsel Ayarlar</a></li>
                                <li><a href="#settings03" data-toggle="tab">SEO Ayarları</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content categories-tabs">
                                <?php 
                                    foreach ($category as $key => $cat) {
                                ?>
                                <div class="tab-pane fade in active" id="settings01">
                                    <div class="form-group">
                                        <label>Kategori Adı</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $cat->name; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Açıklama</label>
                                        <textarea name="description" class="form-control"><?php echo $cat->description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Sırası</label>
                                        <input type="text" name="queue" class="form-control" value="<?php echo $cat->queue ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Listeleme Düzeni</label>
                                        <input type="text" name="list_layout" class="form-control" value="<?php echo $cat->list_layout ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="status" <?php if($cat->status == 1) {echo "checked";} ?>/> Kategori Aktif mi?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings02">
                                    <div class="form-group">
                                        <label>Kategori Resim</label>
                                        <?php if(!empty($cat->image)){ ?>
                                            <img src="<?php echo $cat->image ?>" width="50" height="50" style="display:block;"/>
                                            <div class="checkbox"><label><input type="checkbox" name="delete_image" value="<?php echo $cat->image ?>"> Sil</label></div>
                                        <?php } ?>
                                        <input type="file" name="image" accept="image/*" />
                                        <input type="hidden" name="old_image" value="<?php echo $cat->image ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Banner</label>
                                        <?php if(!empty($cat->banner)){ ?>
                                            <img src="<?php echo $cat->banner ?>" width="50" height="50" style="display:block;"/>
                                            <div class="checkbox"><label><input type="checkbox" name="delete_banner" value="<?php echo $cat->banner ?>"> Sil</label></div>
                                        <?php } ?>
                                        <input type="file" name="banner" accept="image/*" />
                                        <input type="hidden" name="old_banner" value="<?php echo $cat->banner ?>"/>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings03">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <textarea name="meta_title" class="form-control"><?php echo $cat->meta_title ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control"><?php echo $cat->meta_description ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control"><?php echo $cat->meta_keyword ?></textarea>
                                    </div>
                                </div>
                                <?php 
                                    }
                                ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $cat->id ?>" />
                            <a href="backend/categories" class="btn btn-default">Vazgeç</a>
                            <button type="submit" class="btn btn-success">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>