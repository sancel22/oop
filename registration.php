<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>
<?php
$msg="";
if(isset($_POST['submit'])){
	//display($_POST);
	$checkEmail=User::checkEmail($_POST['email']);
	$validEmail=User::validateEmail($_POST['email']);
	$empty= FALSE;
	$gender=TRUE;
	foreach($_POST as $mgafield => $valueniya){
		if(empty($valueniya)){
			$empty=TRUE;
			break;
		}
	}
	
	if($_POST['gender']== "-select one-"){
		$gender=FALSE;
	}
	
	//display($_POST);
	if(!$gender){
		$msg="Please select a gender";
	}
	else if($empty){
		$msg="All fields required!";
	}
	
	else if(!$validEmail){
		$msg="Invalid email";
	}
	else if($checkEmail){
		$msg="Email Already Exists";
	}
	else if($_POST['password'] !== $_POST['cpassword']){
		$msg="Password mismatched";
	}
	
	else{
		$newUser= new User();
		
		$newUser->f_name=$_POST['fname'];
		$newUser->l_name=$_POST['lname'];
		$newUser->gender=$_POST['gender'];
		$newUser->address=$_POST['address'];
		$newUser->contact_number=$_POST['cnumber'];
		$newUser->email=$_POST['email'];
		$newUser->password=sha1($_POST['password']);
		$newUser->status='1';
		$newUser->date_registered=date("Y-m-d H:i:s");
		$newUser->type='1';
	
		if($newUser->save()){
			$msg="New User Added!!";
		}
		else
			$msg="Adding User failed!!!";
	}
}
	
?>
<div id="registration">
  <div id="stylized" class="myform">
  	<?php echo '<span  style="color:red">'.$msg.'</span>';?>
    <form id="form" name="form" method="post" action="">
      <h1>Sign-up form</h1>
      <p>Fill up forms with correct information. </p>
      <label>Firstname <span class="small">Add your firstname</span> </label>
      <input type="text" name="fname" id="fname" 
      value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : ''?>" />
      
      <label>Lastname <span class="small">Add your lastname</span> </label>
      <input type="text" name="lname" id="lname" />
	
    <label>Gender <span class="small">Select gender</span> </label>
      <select name="gender">
      	<option >-select one-</option>
        
		<?php if( isset($_POST['gender']) && $_POST['gender']== 'Male'):?>
        <option selected=selected>Male</option>
        <option>Female</option>
      	
        <?php elseif( isset($_POST['gender']) && $_POST['gender']== 'Female'):?>
        <option >Male</option>
        <option selected=selected>Female</option>
      	<?php else:?>
        
        <option>Male</option>
        <option>Female</option>
      	
      	<?php endif;?>
      </select>
	<label>Address <span class="small">Add your address</span> </label>
      <input type="text" name="address" id="address" />

<label>Contact Number <span class="small">Add your contact number</span> </label>
      <input type="text" name="cnumber" id="address" />
      <p style="clear:both">&nbsp;</p>
      <label>Email <span class="small">Add a valid address</span> </label>
      <input type="text" name="email" id="email" />
      <label>Password <span class="small">Min. size 6 chars</span> </label>
      <input type="text" name="password" id="password" />
      
       <label>Confirm Password <span class="small">Min. size 6 chars</span> </label>
      <input type="text" name="cpassword" id="cpassword" />
      <button name="submit" type="submit" value="ok">Sign-up</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>
<?php require_once('layouts/footer.php'); ?>
