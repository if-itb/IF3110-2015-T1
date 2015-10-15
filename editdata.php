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
	
	$Name = mysqli_real_escape_string($conn,$_POST["Name"]);
	$Email = mysqli_real_escape_string($conn,$_POST["Email"]);
	$Topik = mysqli_real_escape_string($conn,$_POST["Topik"]);
	$Content = mysqli_real_escape_string($conn,$_POST["Content"]);
	$qid = $_GET["id"];
	
	$sql = "UPDATE question SET Name='$Name',Email='$Email',Topik='$Topik',Content='$Content' WHERE QID=$qid";
	
	if ($conn->query($sql) === TRUE ){
		echo "Record updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: index.php");
?>