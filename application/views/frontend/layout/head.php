<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url(); ?>">
	<style>
	<?php if ($this->session->userdata('vendor') == true): ?>
		.vendor_load {display:block;}
		.customer_load, .vendor_unload, .customer_unload {display:none;}
	<?php elseif($this->session->userdata('customer') == true): ?>
		.customer_load {display:block;}
		.vendor_load, .vendor_unload, .customer_unload {display:none;}
	<?php else: ?>
		.vendor_load, .customer_load, .vendor_unload, .customer_unload {display:none;}
	<?php endif ?>
	</style>
	<?php require(APPPATH.'themes/head/head.php'); ?>
</head>