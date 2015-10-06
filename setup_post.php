<?php

include("database/conn.php");

$questions = array();

$query = "SELECT * FROM questions ORDER BY q_datetime DESC";
$result = mysqli_query($dbcon, $query);
if ($result) {
	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$rows['num_answers'] = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM answers WHERE a_qid=". $rows['q_id']. ";"));
		$rows['q_content'] = implode(" ", array_slice(explode(" ", $rows['q_content'], 10), 0, 9));
		$questions[] = $rows;
	}
}

?>