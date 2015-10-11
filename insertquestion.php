<?php
	require_once('dbconnect.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// collect value of input field
		$name = $_POST['name'];
		$email = $_POST['email'];
		$qtopic = $_POST['qtopic'];
		$content = $_POST['content'];
		$sql = "INSERT INTO question(name,email,qtopic,content) VALUES ('$name','$email','$qtopic','$content')";
		$conn->query($sql);
		$conn->close();
	}
	header("Location: {$_SERVER['HTTP_REFERER']}"); 
	exit;
?>