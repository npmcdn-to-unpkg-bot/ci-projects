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
                                <li class="active"><a href="#settings01" data-toggle="tab">Site Genel Ayarlar</a></li>
                                <li><a href="#settings02" data-toggle="tab">Görsel Ayarlar</a></li>
                                <li><a href="#settings03" data-toggle="tab">Site Görünüm Düzeni</a></li>
                                <?php if (isset($restrict_roaming) && $restrict_roaming == 'enable') { ?>
                                <li><a href="#settings04" data-toggle="tab">Üyelik istenilecek sayfalar</a></li>
                                <?php } ?>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content col-lg-10">
                                <div class="tab-pane fade in active" id="settings01">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="enable" name="enable_responsive" <?php if (isset($enable_responsive) && $enable_responsive == 'enable') { ?>checked="checked"<?php } ?> /> site responsive olsun mu?</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="enable" name="restrict_roaming" <?php if (isset($restrict_roaming) && $restrict_roaming == 'enable') { ?>checked="checked"<?php } ?> /> sitede gezinirken üyelik istensin mi?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings02">
                                    <div class="form-group">
                                        <label>Site Logosu</label>
                                        <?php if(!empty($site_logo)){ ?>
                                            <img src="<?php echo $site_logo ?>" width="50" height="50" style="display:block;"/>
                                            <div class="checkbox"><label><input type="checkbox" name="delete_site_logo" value="<?php echo $site_logo ?>"> Sil</label></div>
                                        <?php } ?>
                                        <input type="file" name="site_logo" accept="image/*" />
                                        <input type="hidden" name="old_site_logo" value="<?php echo $site_logo ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Watermark</label>
                                        <?php if(!empty($watermark)){ ?>
                                            <img src="<?php echo $watermark ?>" width="50" height="50" style="display:block;"/>
                                            <div class="checkbox"><label><input type="checkbox" name="delete_watermark" value="<?php echo $watermark ?>"> Sil</label></div>
                                        <?php } ?>
                                        <input type="file" name="watermark" accept="image/*" />
                                        <input type="hidden" name="old_watermark" value="<?php echo $watermark ?>"/>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings03">
                                    <!-- site görünüm düzeni -->
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#site_layout01" data-toggle="tab">Anasayfa</a></li>
                                        <li><a href="#site_layout02" data-toggle="tab">Ürün Listeleme</a></li>
                                        <li><a href="#site_layout03" data-toggle="tab">Ürün Detay</a></li>
                                        <li><a href="#site_layout04" data-toggle="tab">Blog Sayfaları</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="site_layout01">
                                            <!-- anasayfa - görünüm düzeni -->
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label><input type="radio" name="home_page_sidebar" value="enable_sidebar" <?php if (isset($home_page_sidebar) && $home_page_sidebar == 'enable_sidebar') { ?>checked="checked"<?php } ?> > sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="home_page_sidebar" value="enable_leftbar" <?php if (isset($home_page_sidebar) && $home_page_sidebar == 'enable_leftbar') { ?>checked="checked"<?php } ?> > sadece sol bloklu</label>
                                                        <label><input type="radio" name="home_page_sidebar" value="enable_rightbar" <?php if (isset($home_page_sidebar) && $home_page_sidebar == 'enable_rightbar') { ?>checked="checked"<?php } ?> > sadece sag bloklu</label>
                                                        <label><input type="radio" name="home_page_sidebar" value="passive_sidebar" <?php if (isset($home_page_sidebar) && $home_page_sidebar == 'passive_sidebar') { ?>checked="checked"<?php } ?> > bloksuz</label>
                                                        <label><input type="checkbox" name="home_page_passive_footer" value="passive_footer" <?php if (isset($home_page_passive_footer) && $home_page_passive_footer == 'passive_footer') { ?>checked="checked"<?php } ?> > footeru kaldır</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- anasayfa - görünüm düzeni SON -->
                                        </div>
                                        <div class="tab-pane fade" id="site_layout02">
                                            <!-- ürün listeleme - görünüm düzeni -->
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label>Kategori Listeleme Sayfası</label>
                                                    <div class="radio">
                                                        <label><input type="radio" name="category_page_sidebar" value="enable_sidebar" <?php if (isset($category_page_sidebar) && $category_page_sidebar == 'enable_sidebar') { ?>checked="checked"<?php } ?> > sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="category_page_sidebar" value="enable_leftbar" <?php if (isset($category_page_sidebar) && $category_page_sidebar == 'enable_leftbar') { ?>checked="checked"<?php } ?> > sadece sol bloklu</label>
                                                        <label><input type="radio" name="category_page_sidebar" value="enable_rightbar" <?php if (isset($category_page_sidebar) && $category_page_sidebar == 'enable_rightbar') { ?>checked="checked"<?php } ?> > sadece sag bloklu</label>
                                                        <label><input type="radio" name="category_page_sidebar" value="passive_sidebar" <?php if (isset($category_page_sidebar) && $category_page_sidebar == 'passive_sidebar') { ?>checked="checked"<?php } ?> > bloksuz</label>
                                                        <label><input type="checkbox" name="category_page_passive_footer" value="passive_footer" <?php if (isset($category_page_passive_footer) && $category_page_passive_footer == 'passive_footer') { ?>checked="checked"<?php } ?> > footeru kaldır</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Arama Listeleme Sayfası</label>
                                                    <div class="radio">
                                                        <label><input type="radio" name="search_page_sidebar" value="enable_sidebar" <?php if (isset($search_page_sidebar) && $search_page_sidebar == 'enable_sidebar') { ?>checked="checked"<?php } ?> > sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="search_page_sidebar" value="enable_leftbar" <?php if (isset($search_page_sidebar) && $search_page_sidebar == 'enable_leftbar') { ?>checked="checked"<?php } ?> > sadece sol bloklu</label>
                                                        <label><input type="radio" name="search_page_sidebar" value="enable_rightbar" <?php if (isset($search_page_sidebar) && $search_page_sidebar == 'enable_rightbar') { ?>checked="checked"<?php } ?> > sadece sag bloklu</label>
                                                        <label><input type="radio" name="search_page_sidebar" value="passive_sidebar" <?php if (isset($search_page_sidebar) && $search_page_sidebar == 'passive_sidebar') { ?>checked="checked"<?php } ?> > bloksuz</label>
                                                        <label><input type="checkbox" name="search_page_passive_footer" value="passive_footer" <?php if (isset($search_page_passive_footer) && $search_page_passive_footer == 'passive_footer') { ?>checked="checked"<?php } ?> > footeru kaldır</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Marka Listeleme Sayfası</label>
                                                    <div class="radio">
                                                        <label><input type="radio" name="brand_page_sidebar" value="enable_sidebar" <?php if (isset($brand_page_sidebar) && $brand_page_sidebar == 'enable_sidebar') { ?>checked="checked"<?php } ?> > sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="brand_page_sidebar" value="enable_leftbar" <?php if (isset($brand_page_sidebar) && $brand_page_sidebar == 'enable_leftbar') { ?>checked="checked"<?php } ?> > sadece sol bloklu</label>
                                                        <label><input type="radio" name="brand_page_sidebar" value="enable_rightbar" <?php if (isset($brand_page_sidebar) && $brand_page_sidebar == 'enable_rightbar') { ?>checked="checked"<?php } ?> > sadece sag bloklu</label>
                                                        <label><input type="radio" name="brand_page_sidebar" value="passive_sidebar" <?php if (isset($brand_page_sidebar) && $brand_page_sidebar == 'passive_sidebar') { ?>checked="checked"<?php } ?> > bloksuz</label>
                                                        <label><input type="checkbox" name="brand_page_passive_footer" value="passive_footer" <?php if (isset($brand_page_passive_footer) && $brand_page_passive_footer == 'passive_footer') { ?>checked="checked"<?php } ?> > footeru kaldır</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ürün listeleme - görünüm düzeni SON -->
                                        </div>
                                        <div class="tab-pane fade" id="site_layout03">
                                            <!-- ürün detay - görünüm düzeni -->
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label><input type="radio" name="product_page_sidebar" value="enable_sidebar" <?php if (isset($product_page_sidebar) && $product_page_sidebar == 'enable_sidebar') { ?>checked="checked"<?php } ?> > sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="product_page_sidebar" value="enable_leftbar" <?php if (isset($product_page_sidebar) && $product_page_sidebar == 'enable_leftbar') { ?>checked="checked"<?php } ?> > sadece sol bloklu</label>
                                                        <label><input type="radio" name="product_page_sidebar" value="enable_rightbar" <?php if (isset($product_page_sidebar) && $product_page_sidebar == 'enable_rightbar') { ?>checked="checked"<?php } ?> > sadece sag bloklu</label>
                                                        <label><input type="radio" name="product_page_sidebar" value="passive_sidebar" <?php if (isset($product_page_sidebar) && $product_page_sidebar == 'passive_sidebar') { ?>checked="checked"<?php } ?> > bloksuz</label>
                                                        <label><input type="checkbox" name="product_page_passive_footer" value="passive_footer" <?php if (isset($product_page_passive_footer) && $product_page_passive_footer == 'passive_footer') { ?>checked="checked"<?php } ?> > footeru kaldır</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ürün detay - görünüm düzeni SON -->
                                        </div>
                                        <div class="tab-pane fade" id="site_layout04">
                                            <!-- içerik sayfa - görünüm düzeni -->
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label><input type="radio" name="blog_page_sidebar" value="enable_sidebar" <?php if (isset($blog_page_sidebar) && $blog_page_sidebar == 'enable_sidebar') { ?>checked="checked"<?php } ?> > sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="blog_page_sidebar" value="enable_leftbar" <?php if (isset($blog_page_sidebar) && $blog_page_sidebar == 'enable_leftbar') { ?>checked="checked"<?php } ?> > sadece sol bloklu</label>
                                                        <label><input type="radio" name="blog_page_sidebar" value="enable_rightbar" <?php if (isset($blog_page_sidebar) && $blog_page_sidebar == 'enable_rightbar') { ?>checked="checked"<?php } ?> > sadece sag bloklu</label>
                                                        <label><input type="radio" name="blog_page_sidebar" value="passive_sidebar" <?php if (isset($blog_page_sidebar) && $blog_page_sidebar == 'passive_sidebar') { ?>checked="checked"<?php } ?> > bloksuz</label>
                                                        <label><input type="checkbox" name="blog_page_passive_footer" value="passive_footer" <?php if (isset($blog_page_passive_footer) && $blog_page_passive_footer == 'passive_footer') { ?>checked="checked"<?php } ?> > footeru kaldır</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- içerik sayfa - görünüm düzeni SON -->
                                        </div>
                                    </div>
                                    <!-- site görünüm düzeni SON -->
                                </div>
                                <div class="tab-pane fade" id="settings04">
                                    <!-- site dolaşma -->
                                    <div class="panel-body">
                                        <label>Üyelik istenilecek sayfalar</label>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="home_restrict_roaming" value="enable" <?php if (isset($home_restrict_roaming) && $home_restrict_roaming == 'enable') { ?>checked="checked"<?php } ?> > Anasayfa (siteye girişte)</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="listing_restrict_roaming" value="enable" <?php if (isset($listing_restrict_roaming) && $listing_restrict_roaming == 'enable') { ?>checked="checked"<?php } ?> > Listeleme Sayfası</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="details_restrict_roaming" value="enable" <?php if (isset($details_restrict_roaming) && $details_restrict_roaming == 'enable') { ?>checked="checked"<?php } ?> > Detay Sayfası</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="blog_restrict_roaming" value="enable" <?php if (isset($blog_restrict_roaming) && $blog_restrict_roaming == 'enable') { ?>checked="checked"<?php } ?> > Blog Sayfası</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- site dolaşma SON -->
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