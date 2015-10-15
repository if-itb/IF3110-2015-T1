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

	// Add to database
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$content = $_POST["content"];
		$questionID = $_POST["questionID"];
		$sql = "INSERT INTO answer (name, email, content, questionID) VALUES ('$name', '$email', '$content', '$questionID')";
		$conn->query($sql);
		$sql = "UPDATE question SET answers=answers+1 WHERE questionID='$questionID'";
		$conn->query($sql);
	}
	header("Location: /stackExchange/ShowQuestion.php?id=".$questionID);
    exit;
?>