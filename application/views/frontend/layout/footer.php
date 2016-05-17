<?php
	require(APPPATH.$footer[0]->file_path);
	require(APPPATH.'themes/foot/foot.php');
?>
<div class="errors"><?php echo (!empty($this->session->flashdata('errors'))) ? $this->session->flashdata('errors') : '' ; ?></div>
<div class="success"><?php echo (!empty($this->session->flashdata('success'))) ? $this->session->flashdata('success') : '' ; ?></div>
</body>
</html>