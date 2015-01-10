<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>



<div id="content">

<?php 
	$photos=Photograph::find_all();
	
	foreach($photos as $photo){
?>
    <a href="<?php echo $photo->image_path()?>"><img src="<?php echo $photo->image_path()?>" width="200" height="200" /></a>
<?php 	
	}
?>

</div>
<?php require_once('layouts/footer.php'); ?>
