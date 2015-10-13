<?php
	$conn = mysqli_connect("localhost","root","","stackExchange");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$currenta = $_GET["id"];
	$sql = "UPDATE answer SET vote=vote+1 WHERE AID =$currenta ";
	if ($conn->query($sql) === TRUE) {
		echo "Record update successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>