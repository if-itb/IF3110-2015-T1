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
?>