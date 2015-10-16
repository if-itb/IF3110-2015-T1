<?php
	require_once '../database/db.php';

	$answerId = $_POST["id"];

	//Well, seems like this is prone to SQL injection
	$sql = "
		UPDATE answer
		SET votes=votes+1
		WHERE answerId = $answerId
	";

	echo $sql;

	//Insert new question, and get the latest question id
	executeQuery($sql);
?>