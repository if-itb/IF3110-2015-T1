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
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$questionID = $_POST["questionID"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$topic = $_POST["topic"];
		$content = $_POST["content"];
		$sql = "UPDATE question SET name='$name', email='$email', question_topic='$topic', content='$content' WHERE questionID='$questionID'";
		$conn->query($sql);
	}
	header("Location: /stackExchange/ShowQuestion.php?id=".$questionID);
	exit;
?>