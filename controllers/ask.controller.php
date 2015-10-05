<?php
	echo
	require_once("../config/config.php");

	// Add new question
	function addQuestion($question) {
		global $conn;

		$name = mysqli_real_escape_string($conn, $question["name"]);
		$email = mysqli_real_escape_string($conn, $question["email"]);
		$topic = mysqli_real_escape_string($conn, $question["topic"]);
		$content = mysqli_real_escape_string($conn, $question["content"]);
		$date_created = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));
		// Insert new question to database
		$sql = "INSERT INTO question (name, email, topic, content, vote, answer, date_created) VALUES ('$name', '$email', '$topic', '$content', 0, 0, '$date_created')";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
			echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$question = array();
		$question["name"] =  $_POST['name'];
		$question["email"] = $_POST['email'];
		$question["topic"] = $_POST["topic"];
		$question["content"] = $_POST["content"];
		$question["date_created"] = date("Y-m-d H:i:s");

		echo $question["name"];
		echo $question["email"];
		echo $question["topic"];
		echo $question["content"];
		echo $question["date_created"];

		addQuestion($question);
	}
	
?>