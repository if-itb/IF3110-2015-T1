<?php
	require_once("config/config.php");

	// Add new question
	function selectQuestion($id) {
		global $conn;

		$sql = "SELECT * FROM question WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Assign every data to a variable
			$row = mysqli_fetch_assoc($result);
			$question["id"] = $row["id"];
			$question["name"] = $row["name"];
			$question["email"] = $row["email"];
			$question["topic"] = $row["topic"];
			$question["content"] = $row["content"];
			$question["vote"] = $row["vote"];
			$question["answer"] = $row["answer"];
			$question["date_created"] = $row["date_created"];
			$question["date_edited"] = $row["date_edited"];
		}
		return $question;
	}

	function retrieveAnswers($id) {
		global $conn;

		$sql = "SELECT * FROM answer WHERE q_id='$id'";
		$result = mysqli_query($conn, $sql);
		$arr = array();

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				// Assign every data to a variable
				$answer = array();
				$answer["id"] = $row["id"];
				$answer["name"] = $row["name"];
				$answer["email"] = $row["email"];
				$answer["content"] = $row["content"];
				$answer["vote"] = $row["vote"];
				$answer["date_created"] = $row["date_created"];
				$answer["q_id"] = $row["q_id"];
				array_push($arr, $answer);
			}
		}
		return $arr;
	}


?>