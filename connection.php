<?php
	global $db;
	$dbname = "db_stackexchange";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$charset = "utf8";
	
	$db = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset='.$charset, $username, $password);
?>