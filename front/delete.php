<?php
	$conn = mysqli_connect("localhost","root","","stackExchange");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$currentq = $_GET["id"];
	$sql = "DELETE FROM question WHERE QID = $currentq ";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header("Location: index.php")
?>