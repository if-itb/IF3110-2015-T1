<?php
	$servername = "localhost";
	$username = "root";
	$password = "dininta";
	$dbname = "stackexchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// Update database
	$answerID = $_REQUEST["id"];
	$sql = "UPDATE answer SET vote = vote - 1 WHERE answerID='$answerID'";
	$conn->query($sql);

	$sql = "SELECT vote FROM answer where answerID='$answerID'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0)
		echo $row["vote"];
	exit;
?>