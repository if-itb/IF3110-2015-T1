<?php

	$servername = "localhost";
	$username = "root";
	$password = "0LIVER5H";
	$dbname = "stackexchange";

	//create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//check connection
	if ($conn->connect_error) {
		echo "error";
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>