<?php

include("database/conn.php");

// initialize the variables with empty string
$name = "";
$email = "";
$topic = "";
$content = "";

// if the id is sent as parameter, then it is an edit request
if (isset($_GET['id'])) {
	$qid = mysqli_real_escape_string($dbcon, $_GET['id']);
	$query = "SELECT * FROM questions WHERE q_id=".$qid.";";

	$result = mysqli_query($dbcon, $query);
	$question = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$id = $question['q_id'];
	$name = $question['q_name'];
	$email = $question['q_email'];
	$topic = $question['q_topic'];
	$content = $question['q_content'];
}

?>