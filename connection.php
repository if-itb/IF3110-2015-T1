<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";

	/* create connection */
	$connect = mysql_connect($servername, $username, $password);
	
	/* check connection */
	if (!$connect) {
	    die("Connection failed: ".mysql_error());
	}

?>