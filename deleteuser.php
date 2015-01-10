<?php require_once('class/init.php'); ?>
<?php
$id=$_GET['id'];
$foundUser=User::find_by_id($id);
$foundUser->delete();

?>
<script>
	window.location="users.php";
</script>

