<?php require_once('class/init.php'); ?>
<?php require_once('layouts/header.php'); ?>
<div id="user"> 
	<h1>List of Users</h1>
    <hr>
    <br>
    <?php echo output_message($message)?>
 	<table border="1" width="80%">
      <tr>
    	<th>ID</th>
        <th>FullName</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Contact Number</th>	
        <th>Email</th>
        <th>Action</th>	
    </tr>
  <?php
 
 	
 	$allusers=User::find_all();
  	foreach($allusers as $user){
	?>
    <tr>
    	<td><?php echo $user->id ?></td>
        <td><?php echo $user->fullname() ?></td>	
        <td><?php echo $user->gender?></td>	
        <td><?php echo $user->address ?></td>	
        <td><?php echo $user->contact_number ?></td>
        <td><?php echo $user->email ?></td>	
        <td>
        	<?php  
			//if(isset($_SESSION['type']) && $_SESSION['type'] == 0):
			if(isset($session->type) && $session->type == 0):?>
        	<a href="edituser.php?id=<?php echo $user->id?>">Edit</a> 
            	
            | 
            
            <a href="javascript:confirmDelete('<?php echo $user->id?>')">Delete</a>
            
			<?php 
			else:
            	if(isset($session->user_id) && $session->user_id== $user->id):?> 
        	<a href="edituser.php?id=<?php echo $user->id?>">Edit </a>  |  
           <?php endif;	
				
				echo '-';
			
			endif;
			?>
        </td>	
    </tr>
    <?php
		
	}
  ?>
  </table>
</div>
<script>
	function confirmDelete(id){
		var ans=confirm("Are you sure you want to delete this user?");
		
		if(ans){
			window.location="deleteuser.php?id="+id;
		}
		
	}

</script>
<?php require_once('layouts/footer.php'); ?>