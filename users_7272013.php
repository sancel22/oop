<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>


<div id="user"> 
  <h1>List of Users</h1>
  <?php
  	
	
	$foundUser = User::find_by_id(1);
	//echo $foundUser->fullname();
	$foundUser->f_name='Oslec';
	display($foundUser->update());
 	echo '<hr>';
	
 	$allusers=User::find_all();
  	foreach($allusers as $user){
		echo 'Fullname: '.$user->fullname().'<br>';
	}
  ?>
  
  
  
  
</div>
<?php require_once('layouts/footer.php'); ?>