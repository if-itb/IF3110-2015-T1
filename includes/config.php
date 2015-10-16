<?php 
	$server = "localhost";
	$username = "Fikri";
	$password = "";
	$basisdata = "mydata";
	$link = @mysql_connect($server, $username, $password);
	if (!$link) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_select_db($basisdata,$link);
?>