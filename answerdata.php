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
	$Content = mysqli_real_escape_string($conn,$_POST["Content"]);
	$qid = $_GET["id"];
	
	$sql = "insert into answer(`QID`,`Name`,`Email`,`Content`,`Date`) values ('$qid','$Name','$Email','$Content',now())";
	
	if ($conn->query($sql) === TRUE ){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: answer.php?id=$qid");
?>