<?php 
	$server = "localhost";
	$username = "utta";
	$password = "lobe2**";
	$basisdata = "coppeng";
	$link = mysql_connect($server, $username, $password);
	if (!$link) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_select_db($basisdata,$link);
?>