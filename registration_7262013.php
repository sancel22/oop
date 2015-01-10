<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>

<?php 
	$msg='';
	if(isset($_POST['submit'])){
		display($_POST);
		$newUser = new User();
		$newUser->f_name=$_POST['fname'];
		$newUser->l_name=$_POST['lname'];
		$newUser->gender=$_POST['gender'];
		$newUser->address=$_POST['address'];
		$newUser->contact_number=$_POST['c_number'];
		$newUser->email=$_POST['email'];
		$newUser->password=sha1($_POST['password']);
		$newUser->status='0';
		$newUser->date_registered=date("Y-m-d H:is");
		$newUser->type='0';
		
		if($newUser->create()){
			$msg="New User Added!";
		}
		else
			$msg="Error adding record";
	}
?>
<div id="registration">
  <div id="stylized" class="myform">
  	<?php echo output_message($msg);?>
    <form id="form" name="form" method="post" action="">
      <h1>Sign-up form</h1>
      <p>Fill up forms with correct information. </p>
      <label>Firstname <span class="small">Add your firstname</span> </label>
      <input type="text" name="fname" id="fname" />
      
      <label>Lastname <span class="small">Add your lastname</span> </label>
      <input type="text" name="lname" id="lname" />
	
    <label>Gender <span class="small">Select gender</span> </label>
      <select name="gender">
      	<option>-select one-</option>
        <option>Male</option>
        <option>Female</option>
      </select>


	<label>Address <span class="small">Add your address</span> </label>
      <input type="text" name="address" id="address" />

<label>Contact Number <span class="small">Add your contact number</span> </label>
      <input type="text" name="c_number" id="address" />

      
      <p style="clear:both">&nbsp;</p>
      <label>Email <span class="small">Add a valid address</span> </label>
      <input type="text" name="email" id="email" />
      
      <label>Password <span class="small">Min. size 6 chars</span> </label>
      <input type="text" name="password" id="password" />
     
      <label>re-type password <span class="small">Please confirm password</span> </label>
      <input type="text" name="password" id="password" />

      <button name="submit" type="submit">Sign-up</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>
<?php require_once('layouts/footer.php'); ?>
