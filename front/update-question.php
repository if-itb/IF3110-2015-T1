<?php
	$conn = mysqli_connect("localhost","root","","stackExchange");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$Name =  mysqli_real_escape_string($conn, $_POST["Name"]);
	$Email =  mysqli_real_escape_string($conn, $_POST["Email"]);
	$Topic =  mysqli_real_escape_string($conn, $_POST["Topic"]);
	$Content =  mysqli_real_escape_string($conn, $_POST["Content"]);	
	$currentq = $_GET["id"];
	$sql = "UPDATE question SET Name='$Name',Email='$Email',Topic='$Topic',Content='$Content' WHERE QID =$currentq ";
	if ($conn->query($sql) === TRUE) {
		echo "Record update successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header("Location: index.php")
?>