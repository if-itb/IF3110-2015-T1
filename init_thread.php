<?php

include("database/conn.php");

if (isset($_GET['id'])) {
	// finding question from the database with the id
	$id = mysqli_real_escape_string($dbcon, $_GET['id']);
	$q_query = "SELECT * FROM questions WHERE q_id=". $id .";";
	$result = mysqli_query($dbcon, $q_query);
	$question = mysqli_fetch_array($result, MYSQLI_ASSOC);

	// fetching answers to the question
	$a_query = "SELECT * FROM answers WHERE a_qid=". $id ." ORDER BY a_vote DESC, a_datetime DESC;";
	$result = mysqli_query($dbcon, $a_query);
	$answers = array();
	if ($result) {
		while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$answers[] = $rows;
	}

} else {
	header("Location: index.php");
	die();
}

?>