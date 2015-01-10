<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>

<?php
	
	if($session->is_logged_in()){
		redirect_to('index.php');
	}

$msg="";

if(isset($_POST['submit'])){
	
	$email=$database->escape_value($_POST['log']);
	$password=$database->escape_value($_POST['pwd']);
	
	$foundUser=User::authenticate($email,$password);
	
	if($foundUser){
		$session->login($foundUser);
		redirect_to('index.php');
	}
	else{
		$msg="Email/Password Combination Failed";
	}
}



?>
<div id="login">
	
  <h1>Photo Gallery</h1>
  
  <form method="post" action="" id="loginform" name="loginform">
  <?php echo '<span style="color:red">'.output_message($msg).'</span>';?>
    <p>
      <label for="user_login">Username<br>
        <input type="text" tabindex="10" size="20" value="" class="input" id="user_login" name="log">
      </label>
    </p>
    <p>
      <label for="user_pass">Password<br>
        <input type="password" tabindex="20" size="20" value="" class="input" id="user_pass" name="pwd">
      </label>
    </p>
    <p id="nav" style="float:left"> <a title="Password Lost and Found" href="#">Lost your password?</a> </p>
    <p class="submit">
      <input type="submit" tabindex="100" value="Log In" class="button-primary" id="wp-submit" name="submit">
      
    </p>
  </form>
  
</div>
<?php require_once('layouts/footer.php'); ?>
