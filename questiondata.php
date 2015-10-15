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
	$Topik = $_POST["Topik"];
	$Content = $_POST["Content"];
	
	$sql = "insert into question(`Name`,`Email`,`Topik`,`Content`,`Date`) values ('$Name','$Email','$Topik','$Content',now())";
	
	if ($conn->query($sql) === TRUE ){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: index.php");
?>