<div id="header">
<div class="container">
<div class="logo" style="width:120px;"><a href="http://localhost/ci-projects/"><img src="assets/uploads/system/images/site_logo_G0PdXLLsmVYmY2-logo.jpg" /></a></div>
<div class="hmenu">
<?php include(APPPATH.$header_category[0]->file_path); ?>
</div>
<div class="vendor_load">(vendor)Kullanıcı Adı : <?php echo $this->session->userdata("username") ?></div>
<div class="customer_load">(customer)Kullanıcı Adı : <?php echo $this->session->userdata("username") ?></div>
</div>
</div>