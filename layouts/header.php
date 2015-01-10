
<?php
	$url=pathinfo($_SERVER['REQUEST_URI']);
	
	
	$page=$url['filename'];
	
	$home=$users=$login=$register=$photos=$upload='';
	 switch($page){
	 	case 'users':
			$users="id='active'";
			break;
	 	case 'login':
			$login="id='active'";
			break;
		case 'registration':
			$register="id='active'";
			break;
		case 'photos':
			$photos="id='active'";
			break;
		case 'upload':
			$upload="id='active'";
			break;
		default:
			$home="id='active'";
			break;
	 }

?>
<html>
  <head>
  	<link rel='shortcut icon' type='image/x-icon' href="images/application_view_gallery.png" />
    <title>Photo Gallery<?php echo $page != "index" ? " | ".strtoupper($page) : '' ?></title>
  <link href="stylesheets/main.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="header">
      <div class="wrapper">
      <!--<h1><a href="index.php">Photo Gallery</a></h1>-->
    	<div id="navigation">
        <ul>
        	<li <?php echo $home ?>><a href="index.php" >Home</a></li>
            <li <?php echo $users ?>><a href="users.php">Users</a></li>
            
            <?php if(!$session->is_logged_in()):?>
            <li <?php echo $login ?>><a href="login.php" >Login</a></li>
            <li <?php echo $register ?>><a href="registration.php" >Register</a></li>
            <?php else:?>
            <li <?php echo $photos ?>><a href="photos.php" >Photos</a></li>
            <li <?php echo $login ?>><a href="logout.php" >Log-out</a></li>
            <?php endif?>
        </ul>
        </div>
       </div> 
    </div>
    <div id="main">
		<div class="wrapper">