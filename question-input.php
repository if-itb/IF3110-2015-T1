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
	$input_content = mysql_real_escape_string($content);
	$sql = "INSERT INTO question (`Nama`, `Email`, `Topic`, `Content`) VALUES('$name', '$email', '$topic', '$input_content')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	
	$conn->close();
	header("Location: /WBD/index.php");
?>