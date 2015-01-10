<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>
<?php 
	
	if(!$session->is_logged_in()){
		redirect_to('index.php');
	}
?>
<a href="upload.php">Upload Photo</a>
<br>
<br>
<div id="content">
[content here]
</div>
<?php require_once('layouts/footer.php'); ?>
