<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>
<?php 
	
	if(!$session->is_logged_in()){
		redirect_to('index.php');
	}
?>
<?php

	$message = "";
	if(isset($_POST['submit'])) {
		$photo = new Photograph();
		$photo->caption = $_POST['caption'];
		$photo->user_id = $session->user_id;
		$photo->attach_file($_FILES['file_upload']);
		if($photo->save()) {
			// Success
      $message = "Photograph uploaded successfully.";
		} else {
			// Failure
      $message = join("<br />", $photo->errors);
		}
	}
	
?>
<h2>Photo Upload</h2>

	<?php echo output_message($message); ?>
  	<form action="" enctype="multipart/form-data" method="POST">
    <p><input type="file" name="file_upload" /></p>
    <p>Caption: <input type="text" name="caption" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
  </form>
  



<?php require_once('layouts/footer.php'); ?>
