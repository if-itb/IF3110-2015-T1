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
		$topic = $_POST["topic"];
		$content = $_POST["content"];
		$sql = "INSERT INTO question (name, email, question_topic, content) VALUES ('$name', '$email', '$topic', '$content')";
		$conn->query($sql);
	}
	$last_id = mysqli_insert_id($conn);
	header("Location: /stackExchange/ShowQuestion.php?id=".$last_id);
    exit;
?>