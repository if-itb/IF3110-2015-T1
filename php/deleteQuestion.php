<?php

	define('dbName','SimpleStackExchange');
	define('dbUser','root');
	define('dbPass','');
	define('dbHost','localhost');

	// create connection
	$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
	
	// delete question
	$query = "DELETE FROM question WHERE QuestionID=" . $_GET["id"];
	
	// execute query
	$result = mysqli_query ($dbConn,$query);
	
	// Close connection
	mysqli_close($dbConn);

	// send to
	header("Location: /wbd/page1.php");
?>