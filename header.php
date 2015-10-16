<?php
function connectToDatabase() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stack_exchange";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}
?>