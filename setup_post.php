<?php

include("database/conn.php");

$questions = array();

$query = "SELECT * FROM questions ORDER BY q_datetime DESC";
$result = mysqli_query($dbcon, $query);
if ($result) {
	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$questions[] = $rows;
	}
}

?>