<?php

	define('dbName','SimpleStackExchange');
	define('dbUser','root');
	define('dbPass','');
	define('dbHost','localhost');

	// create connection
	$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
	
	// update vote
	$query = "UPDATE answers SET Vote=Vote-1
							WHERE AnswerID=" . $_GET["id"];
	$query2 = "SELECT * FROM answers WHERE AnswerID=" . $_GET["id"];
	
	// execute query
	$result = mysqli_query ($dbConn,$query);
	$result2 = mysqli_query ($dbConn,$query2);

	// update vote number
	while ($fetched = $result2->fetch_assoc())
	{
		echo $fetched['Vote'];
	}
	
	// Close connection
	mysqli_close($dbConn);

?>