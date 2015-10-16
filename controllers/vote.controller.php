<?php
	require_once("../config/config.php");

	// Add vote of question
	function addQuestionVote($id) {
		global $conn;

		// Add vote
		$sql = "UPDATE question SET vote = 1 + vote WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
		} else {
			// Error
		}

		// Get number vote
		$sql = "SELECT vote FROM question WHERE id='$id'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Assign every data to a variable
			$row = mysqli_fetch_assoc($result);
			$current_vote = $row["vote"];
			echo $current_vote;
		}
	}

	// Decrement vote of question
	function decQuestionVote($id) {
		global $conn;

		// Add vote
		$sql = "UPDATE question SET vote = vote - 1 WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
		} else {
			// Error
		}

		// Get number vote
		$sql = "SELECT vote FROM question WHERE id='$id'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Assign every data to a variable
			$row = mysqli_fetch_assoc($result);
			$current_vote = $row["vote"];
			echo $current_vote;
		}
	}

	// Add vote of answer
	function addAnswerVote($id) {
		global $conn;

		// Add vote
		$sql = "UPDATE answer SET vote = 1 + vote WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
		} else {
			// Error
		}

		// Get number vote
		$sql = "SELECT vote FROM answer WHERE id='$id'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Assign every data to a variable
			$row = mysqli_fetch_assoc($result);
			$current_vote = $row["vote"];
			echo $current_vote;
		}
	}

	// Decrement vote of answer
	function decAnswerVote($id) {
		global $conn;

		// Add vote
		$sql = "UPDATE answer SET vote = vote - 1 WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
		} else {
			// Error
		}

		// Get number vote
		$sql = "SELECT vote FROM answer WHERE id='$id'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Assign every data to a variable
			$row = mysqli_fetch_assoc($result);
			$current_vote = $row["vote"];
			echo $current_vote;
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$question = array();
		$id =  $_GET['id'];
		$identify = $_GET['identify'];
		$type= $_GET['type'];
		if ($identify == "question" && $type == "up")
			addQuestionVote($id);
		else if ($identify == "question" && $type == "down")
			decQuestionVote($id);
		else if ($identify == "answer" && $type == "up")
			addAnswerVote($id);
		else if ($identify == "answer" && $type == "down")
			decAnswerVote($id);
	}
?>