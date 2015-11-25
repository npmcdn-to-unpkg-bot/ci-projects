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
                        <form action="" method="post">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs vertical-tabs col-lg-2">
                                <li class="active"><a href="#settings01" data-toggle="tab">Site Genel Ayarlar</a></li>
                                <li><a href="#settings02" data-toggle="tab">Görsel Ayarlar</a></li>
                                <li><a href="#settings03" data-toggle="tab">Site Görünüm Düzeni</a></li>
                                <li><a href="#settings04" data-toggle="tab">Üyelik istenilecek sayfalar</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content col-lg-10">
                                <div class="tab-pane fade in active" id="settings01">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="enable" name="enable_responsive" /> site responsive olsun mu?</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="enable" name="restrict_roaming" /> sitede gezinirken üyelik istensin mi?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings02">
                                    <div class="form-group">
                                        <label>Site Logosu</label>
                                        <input type="file" name="site_logo" accept="image/*" />
                                    </div>
                                    <div class="form-group">
                                        <label>Watermark</label>
                                        <input type="file" name="watermark" accept="image/*" />
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
                                                        <label><input type="radio" name="home_page_sidebar" value="enable_sidebar"> sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="home_page_sidebar" value="enable_leftbar"> sadece sol bloklu</label>
                                                        <label><input type="radio" name="home_page_sidebar" value="enable_rightbar"> sadece sag bloklu</label>
                                                        <label><input type="radio" name="home_page_sidebar" value="passive_sidebar"> bloksuz</label>
                                                        <label><input type="checkbox" name="home_page_passive_footer" value="passive_footer"> footeru kaldır</label>
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
                                                        <label><input type="radio" name="category_page_sidebar" value="enable_sidebar"> sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="category_page_sidebar" value="enable_leftbar"> sadece sol bloklu</label>
                                                        <label><input type="radio" name="category_page_sidebar" value="enable_rightbar"> sadece sag bloklu</label>
                                                        <label><input type="radio" name="category_page_sidebar" value="passive_sidebar"> bloksuz</label>
                                                        <label><input type="checkbox" name="category_page_passive_footer" value="passive_footer"> footeru kaldır</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Arama Listeleme Sayfası</label>
                                                    <div class="radio">
                                                        <label><input type="radio" name="search_page_sidebar" value="enable_sidebar"> sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="search_page_sidebar" value="enable_leftbar"> sadece sol bloklu</label>
                                                        <label><input type="radio" name="search_page_sidebar" value="enable_rightbar"> sadece sag bloklu</label>
                                                        <label><input type="radio" name="search_page_sidebar" value="passive_sidebar"> bloksuz</label>
                                                        <label><input type="checkbox" name="search_page_passive_footer" value="passive_footer"> footeru kaldır</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Marka Listeleme Sayfası</label>
                                                    <div class="radio">
                                                        <label><input type="radio" name="brand_page_sidebar" value="enable_sidebar"> sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="brand_page_sidebar" value="enable_leftbar"> sadece sol bloklu</label>
                                                        <label><input type="radio" name="brand_page_sidebar" value="enable_rightbar"> sadece sag bloklu</label>
                                                        <label><input type="radio" name="brand_page_sidebar" value="passive_sidebar"> bloksuz</label>
                                                        <label><input type="checkbox" name="brand_page_passive_footer" value="passive_footer"> footeru kaldır</label>
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
                                                        <label><input type="radio" name="product_page_sidebar" value="enable_sidebar"> sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="product_page_sidebar" value="enable_leftbar"> sadece sol bloklu</label>
                                                        <label><input type="radio" name="product_page_sidebar" value="enable_rightbar"> sadece sag bloklu</label>
                                                        <label><input type="radio" name="product_page_sidebar" value="passive_sidebar"> bloksuz</label>
                                                        <label><input type="checkbox" name="product_page_passive_footer" value="passive_footer"> footeru kaldır</label>
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
                                                        <label><input type="radio" name="blog_page_sidebar" value="enable_sidebar"> sağ ve sol bloklu</label>
                                                        <label><input type="radio" name="blog_page_sidebar" value="enable_leftbar"> sadece sol bloklu</label>
                                                        <label><input type="radio" name="blog_page_sidebar" value="enable_rightbar"> sadece sag bloklu</label>
                                                        <label><input type="radio" name="blog_page_sidebar" value="passive_sidebar"> bloksuz</label>
                                                        <label><input type="checkbox" name="blog_page_passive_footer" value="passive_footer"> footeru kaldır</label>
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
                                                <label><input type="checkbox" name="home_restrict_roaming" value="enable"> Anasayfa (siteye girişte)</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="listing_restrict_roaming" value="enable"> Listeleme Sayfası</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="details_restrict_roaming" value="enable"> Detay Sayfası</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="blog_restrict_roaming" value="enable"> Blog Sayfası</label>
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