<?php

	define('dbName','SimpleStackExchange');
	define('dbUser','root');
	define('dbPass','');
	define('dbHost','localhost');
	
	// create connection
	$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
	
	// insert to answer
	$query = "INSERT INTO answers (Name,Email,Answer,QuestionID)
							VALUES ('$_POST[name]','$_POST[email]','$_POST[answer]'," . $_GET["id"] . ")";
	
	// update question
	$query2 = "UPDATE question SET Answer=Answer+1
								WHERE QuestionID=" . $_GET["id"];
	
	// execute query
	$result = mysqli_query ($dbConn,$query);
	$result2 = mysqli_query ($dbConn,$query2);
	
	// Close connection
	mysqli_close($dbConn);

	// send to
	header("Location: /wbd/page3.php?id=" . $_GET[id]);
	
?>