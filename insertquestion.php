<?php
	require_once('dbconnect.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// collect value of input field
		$name = $conn->real_escape_string($_POST['name']);
		$email = $conn->real_escape_string($_POST['email']);
		$qtopic = $conn->real_escape_string($_POST['qtopic']);
		$content = $conn->real_escape_string($_POST['content']);
		$sql = "INSERT INTO question(name,email,qtopic,content) VALUES ('$name','$email','$qtopic','$content')";
		$conn->query($sql);
		$sql = "SELECT id FROM question WHERE name='$name' AND email='$email' AND qtopic='$qtopic' and content='$content'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row['id'];
		$conn->close();
	}
	header("Location: question.php?id=$id"); 
	exit;
?>