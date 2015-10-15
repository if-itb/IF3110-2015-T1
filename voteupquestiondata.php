<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$qid = $_GET["id"];
	$sql = "UPDATE question SET Vote = Vote + 1 WHERE QID=$qid";
	
	if ($conn->query($sql) === TRUE) {
		echo "Record update successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>