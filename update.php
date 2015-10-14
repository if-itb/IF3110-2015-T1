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
	$topic = $_POST["Question-topic"];
	$content = $_POST["Content"];
	$question_id = $_GET["id"];
	$sql = "UPDATE question SET `Nama` = '$name', `Email` = '$email', `Topic`='$topic', `Content`='$content' WHERE (ID = '$question_id')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	
	$conn->close();
	header("Location: /WBD/index.php");
?>