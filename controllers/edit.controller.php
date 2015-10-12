<?php
	echo
	require_once("../config/config.php");

	// Edit question
	function editQuestion($question) {
		global $conn;

		$id = $question["id"];
		$name = $question["name"];
		$email = $question["email"];
		$topic = $question["topic"];
		$content = $question["content"];
		$date_edited = date("Y-m-d H:i:s") ;
		// Insert new question to database
		$sql = "UPDATE question SET name='$name', email='$email',
		topic='$topic', content='$content', date_edited = '$date_edited' WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
			header('location: ../question.php?q_id=' . $id);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$question = array();
		$question["id"] =  $_POST['q_id'];
		$question["name"] =  $_POST['name'];
		$question["email"] = $_POST['email'];
		$question["topic"] = $_POST["topic"];
		$question["content"] = $_POST["content"];

		editQuestion($question);
	}
?>