<?php
	$conn = mysqli_connect("localhost","root","","stackExchange");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$Name = $_POST["Name"];
	$Email = $_POST["Email"];
	$Topic = $_POST["Topic"];
	$Content = $_POST["Content"];	
	$sql = "Insert into question (`Name`,`Email`,`Topic`,`Content`,`Date`) values('$Name','$Email','$Topic','$Content',now()) ";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

	header("Location: index.php")
?>