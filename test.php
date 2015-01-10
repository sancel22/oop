<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

$a=5;
function a(){
	//global $a;
	//$a=10;
	echo $a;
}

echo $a;
echo '<br>';
echo a();

echo '<br>';
echo $a;

?>
</body>
</html>