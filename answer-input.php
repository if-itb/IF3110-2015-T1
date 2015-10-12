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
	
	$name = $_POST["Name"];
	$email = $_POST["Email"];
	$content = $_POST["Content"];
	$question_ID = $_GET["id"]
	$sql = "INSERT INTO answer (`question_ID`, `Nama`, `Email`, `Content`) VALUES('$question_ID', '$name', '$email', '$content')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	
	$conn->close();
	header("Location: /WBD/answer.php");
?>