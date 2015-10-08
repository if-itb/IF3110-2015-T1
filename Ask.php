<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "INSERT INTO question (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
	
?>