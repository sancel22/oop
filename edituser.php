<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>
<?php
//display($_SESSION['user_id']);

$id=$_GET['id'];
if($session->user_id != $id && $session->type == '1'){
	redirect_to("edituser.php?id=$session->user_id");

}
	

$id=$_GET['id'];
$foundUser=User::find_by_id($id);
if(isset($_POST['submit'])){
	
	$foundUser->f_name=$_POST['fname'];
	$foundUser->l_name=$_POST['lname'];
	$foundUser->gender=$_POST['gender'];
	$foundUser->address=$_POST['address'];
	$foundUser->contact_number=$_POST['cnumber'];
	
	if($foundUser->save()){
		$session->message("User ". $foundUser->f_name." has been updated");
		redirect_to('users.php');
	}
	else
		$msg="Editing failed!!!";
}	
?>

<div id="registration">
  <div id="stylized" class="myform">
  	
    <form id="form" name="form" method="post" action="">
      <h1>Sign-up form</h1>
      <p>Fill up forms with correct information. </p>
      <label>Firstname <span class="small">Add your firstname</span> </label>
      <input type="text" name="fname" id="fname" value="<?php echo $foundUser->f_name ?>" />
      
      <label>Lastname <span class="small">Add your lastname</span> </label>
      <input type="text" name="lname" id="lname" value="<?php echo $foundUser->l_name ?>" />
	
    <label>Gender <span class="small">Select gender</span> </label>
      <select name="gender">
      	<option>-select one-</option>
        <option <?php echo ($foundUser->gender == 'Male')? 'selected="selected"':''?>>Male</option>
        <option <?php echo ($foundUser->gender == 'Female')? 'selected="selected"':''?>>Female</option>
      </select>
	<label>Address <span class="small">Add your address</span> </label>
      <input type="text" name="address" id="address" value="<?php echo $foundUser->address ?>"/>

<label>Contact Number <span class="small">Add your contact number</span> </label>
      <input type="text" name="cnumber" id="address"  value="<?php echo $foundUser->contact_number ?>"/>
     
      <button name="submit" type="submit">Update</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>
<?php require_once('layouts/footer.php'); ?>
