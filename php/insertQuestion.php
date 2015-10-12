<?php

	define('dbName','SimpleStackExchange');
	define('dbUser','root');
	define('dbPass','');
	define('dbHost','localhost');

	// create connection
	$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
	
	// insert to question
	$query = "INSERT INTO question (Name,Email,Topic,Question)
							VALUES ('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[question]')";
	
	// execute query
	$result = mysqli_query ($dbConn,$query);
	
	// Close connection
	mysqli_close($dbConn);

	// send to
	header("Location: /wbd/page1.php");
?>