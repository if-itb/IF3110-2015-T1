<?php
	require_once('dbconnect.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// collect value of input field
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$qtopic = $_POST['qtopic'];
		$content = $_POST['content'];
		$sql = "UPDATE question
				SET name='$name',
					email='$email',
					qtopic='$qtopic',
					content='$content'
				WHERE
					id='$id'";
		$conn->query($sql);
		$conn->close();
	}
	header("Location: question.php?id=$id"); 
	exit;
?>