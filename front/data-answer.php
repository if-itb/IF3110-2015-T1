<?php
	$conn = mysqli_connect("localhost","root","","stackExchange");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$Name = $_POST["Name"];
	$Email = $_POST["Email"];
	$Content = $_POST["Content"];	
	$currentq = $_GET["id"];
	$sql = "Insert into answer (`QID`,`Name`,`Email`,`Content`,`Date`) values('$currentq','$Name','$Email','$Content',now()) ";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

	header("Location: answer.php?id=$currentq");
?>