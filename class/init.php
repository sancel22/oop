<?php

	define('DS',DIRECTORY_SEPARATOR); // "/", "\"
	define('SITE_ROOT',"C:".DS."wamp".DS."www".DS."photo_gallery");
	define('LIB_PATH',"C:".DS."wamp".DS."www".DS."photo_gallery".DS."class");
	
	require_once(LIB_PATH.DS.'functions.php');
	
	require_once(LIB_PATH.DS.'session.php');
	require_once(LIB_PATH.DS.'database.php');
	require_once(LIB_PATH.DS.'databaseobject.php');
	
	require_once(LIB_PATH.DS.'user.php');
	
?>

