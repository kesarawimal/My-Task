<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shrink</title>
</head>
<body>

	<h1><?php if (isset($url)) {
		echo base_url() . "shrink/a/" . $url;
	} ?></h1>

	<h1><?php if (isset($send)) {
		//echo $send->url;
		redirect($send->url);
	} ?></h1>

	<?php echo form_open('shrink/insert'); ?>
	<?php echo form_label('Enter URL') ?>
	<?php echo form_input(array('name' => 'url')) ?>
	<?php echo form_submit(array('id'=>'submit','value'=>'Add')); ?>
	<?php echo form_close(); ?>
</body>
</html>