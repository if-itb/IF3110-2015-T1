<?php
	require_once '../database/db.php';

	$questionId = $_POST["id"];

	//Well, seems like this is prone to SQL injection
	$sql = "
		UPDATE question
		SET votes=votes-1
		WHERE questionId = $questionId
	";

	echo $sql;

	//Insert new question, and get the latest question id
	executeQuery($sql);
?>