<?php

	include("connection.php");

	$questions = array();

	if (isset($_GET['search']) && isset($_GET['searchquery'])) {
		$searchquery = $_GET['searchquery'];
		$query = "SELECT * FROM question WHERE q_content LIKE '%".$searchquery."%' OR q_topic LIKE '%".$searchquery."%';";
		$index_title = "Search Results by keywords '".$searchquery."'";
	} else {
		$query = "SELECT * FROM question ORDER BY q_datetime DESC";
		$index_title = "Recently Asked Questions";
	}
	$result = mysqli_query($conn, $query);
	if ($result) {
		while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$rows['num_answers'] = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM answer WHERE a_q_id=". $rows['q_id']. ";"));
			$rows['q_content'] = implode(" ", array_slice(explode(" ", $rows['q_content'], 10), 0, 9));
			$questions[] = $rows;
		}
	}
?>