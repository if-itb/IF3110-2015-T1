<?php
	include("connection.php");

	$questions = array();

	if (isset($_GET['search']) && isset($_GET['searchquery'])) {
		$searchquery = $_GET['searchquery'];
		$query = "SELECT * FROM questions WHERE q_content LIKE '%".$searchquery."%' OR q_topic LIKE '%".$searchquery."%';";
		$index_title = "Search Results for '".$searchquery."'";
	} else {
		$query = "SELECT * FROM questions ORDER BY q_datetime DESC";
		$index_title = "Recently Asked Questions";
	}
	
	$result = mysqli_query($dbcon, $query);
	if ($result) {
		while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$rows['num_answers'] = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM answers WHERE a_qid=". $rows['q_id']. ";"));
			$rows['q_content'] = implode(" ", array_slice(explode(" ", $rows['q_content'], 10), 0, 9));
			$questions[] = $rows;
		}
	}
?>