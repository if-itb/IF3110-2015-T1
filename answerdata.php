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
	
	$Name = $_POST["Name"];
	$Email = $_POST["Email"];
	$Content = $_POST["Content"];
	$currentq = $_GET["id"];
	
	$sql = "insert into answer(`QID`,`Name`,`Email`,`Content`) values ('$currentq','$Name','$Email','$Content')";
	
	if ($conn->query($sql) === TRUE ){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: answer.php?id=$currentq");
?>