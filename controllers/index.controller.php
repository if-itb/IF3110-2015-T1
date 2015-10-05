<?php
	require_once("config/config.php");

	// Retrieve all questions that have been asked
	function retrieveQuestions() {
		global $conn;

		$sql = "SELECT * FROM question;";
		$result = mysqli_query($conn, $sql);

		$arr = array();

		if (mysqli_num_rows($result) > 0) {
			// Assign every data of each row to array of question
			while ($row = mysqli_fetch_assoc($result)) {
				$question = array();
				$question["id"] = $row["id"];
				$question["name"] = $row["name"];
				$question["email"] = $row["email"];
				$question["content"] = $row["content"];
				$question["vote"] = $row["vote"];
				$question["date_created"] = $row["date_created"];
				$question["date_edited"] = $row["date_edited"];
				array_push($arr, $question);
			}
		}
		return $arr;
	}
?>