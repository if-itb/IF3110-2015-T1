<?php
	require_once '../database/db.php';

	$questionId = $_POST["questionId"];
	$answerer = $_POST["answerer"];
	$content = $_POST["content"];
	$email = $_POST["email"];

	//Well, seems like this is prone to SQL injection
	$sql = "
		INSERT INTO answer(questionId, content, answerer, email)
		VALUES ($questionId, \"$content\", \"$answerer\", \"$email\")
	";

	//Insert answer
	executeQuery($sql);
	
	//Refresh to the previous page, and kill this script
	header("Location: /viewquestion.php?id=$questionId");
	die();
?>