<?php
	require_once("config/config.php");
	
	 // Retrieve all questions that have been asked
	function getSearchResult($keyword_search) {
		global $conn;

		$keyword = mysqli_real_escape_string($conn, $keyword_search);
		$sql = "SELECT * FROM question WHERE topic LIKE '%$keyword%' OR content LIKE '%keyword' ORDER BY date_created DESC;";
		$result = mysqli_query($conn, $sql);

		$arr = array();

		if (mysqli_num_rows($result) > 0) {
			// Assign every data of each row to array of question
			while ($row = mysqli_fetch_assoc($result)) {
				$question = array();
				$question["id"] = $row["id"];
				$question["name"] = $row["name"];
				$question["email"] = $row["email"];
				$question["topic"] = $row["topic"];
				$question["content"] = $row["content"];
				$question["vote"] = $row["vote"];
				$question["answer"] = $row["answer"];
				$question["date_created"] = $row["date_created"];
				$question["date_edited"] = $row["date_edited"];
				array_push($arr, $question);
			}
		}
		return $arr;
	}
?>