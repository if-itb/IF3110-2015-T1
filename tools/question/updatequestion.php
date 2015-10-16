<?php
	require_once '../database/db.php';

	$questionId = $_POST["questionId"];
	$asker = $_POST["asker"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];
	$email = $_POST["email"];

	//Well, seems like this is prone to SQL injection
	$sql = "
		UPDATE question
		SET topic=\"$topic\", content=\"$content\", asker=\"$asker\", email=\"$email\"
		WHERE questionId = $questionId
	";

	//Insert new question, and get the latest question id
	executeQuery($sql);
	
	//Refresh to the latest page
	header("Location: /viewquestion.php?id=$questionId");
	die();
?>