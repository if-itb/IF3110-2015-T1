<?php
	echo
	require_once("../config/config.php");

	// Add new question
	function addAnswer($answer) {
		global $conn;

		$q_id = $answer["q_id"];
		$name = $answer["name"];
		$email = $answer["email"];
		$content = $answer["content"];
		$date_created = date("Y-m-d H:i:s");

		// Insert new answer to database
		$sql = "INSERT INTO answer (name, email, content, vote, date_created, q_id)
		VALUES ('$name', '$email', '$content', 0, '$date_created', '$q_id')";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
			echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		// Increase number of answer of question
		$sql = "UPDATE question SET answer = 1 + answer WHERE id='$q_id'";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
			header('location: ../question.php?q_id=' . $q_id);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$answer = array();
		$answer["q_id"] =  $_POST['q_id'];
		$answer["name"] =  $_POST['name'];
		$answer["email"] = $_POST['email'];
		$answer["content"] = $_POST["content"];
		$answer["date_created"] = date("Y-m-d H:i:s");

		addAnswer($answer);
	}
	
?>