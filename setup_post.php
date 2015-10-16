<?php

include("database/conn.php");

$questions = array();

if (isset($_GET['search']) && isset($_GET['searchquery']) && $_GET['searchquery'] != "") {
	// if it is a search request, initialize query to search within questions containing the keyword
	$searchquery = mysqli_real_escape_string($dbcon, $_GET['searchquery']);
	$query = "SELECT * FROM questions WHERE q_content LIKE '%".$searchquery."%' OR q_topic LIKE '%".$searchquery."%';";
	$index_title = "Search Results for '".$searchquery."'";
} else {
	// if start page, initialize query to fetch all questions
	$query = "SELECT * FROM questions ORDER BY q_datetime DESC";
	$index_title = "Recently Asked Questions";
}

$result = mysqli_query($dbcon, $query);
if ($result) {
	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$rows['num_answers'] = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM answers WHERE a_qid=". $rows['q_id']. ";"));
		// making part of the content for index page
		$rows['q_content'] = implode(" ", array_slice(explode(" ", $rows['q_content'], 10), 0, 9));
		$questions[] = $rows;
	}
}

?>