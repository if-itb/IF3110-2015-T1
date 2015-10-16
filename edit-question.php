<?php
	include("connection.php");

	$name = "";
	$email = "";
	$topic = "";
	$content = "";
	$target = "new";


	if ($_GET['req'] == "edit") {
		$qid = $_GET['id'];
		$query = "SELECT * FROM question WHERE q_id=".$qid.";";
		$result = mysqli_query($conn, $query);
		$question = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$id = $question['q_id'];
		$name = $question['q_name'];
		$email = $question['q_email'];
		$topic = $question['q_topic'];
		$content = $question['q_content'];
		$target = "update";
	} else if ($_GET['req'] == "new") {
		$target = "new";
	}

?>