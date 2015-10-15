<?php
	$servername = "localhost";
	$username = "root";
	$password = "dininta";
	$dbname = "stackexchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// Delete from database
	$id = $_GET["id"];
	$sql = "DELETE FROM answer WHERE questionID=$id";
	$conn->query($sql);
	$sql = "DELETE FROM question WHERE questionID=$id";
	$conn->query($sql);
	
	header("Location: /stackExchange/index.php");
    exit;
?>