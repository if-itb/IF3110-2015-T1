<?php
	require_once '../database/db.php';

	$asker = $_POST["asker"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];
	$email = $_POST["email"];

	//Well, seems like this is prone to SQL injection
	$sql = "
		INSERT INTO question(topic, content, asker, email)
		VALUES (\"$topic\", \"$content\", \"$asker\", \"$email\")
	";

	//Insert new question, and get the latest question id
	$latest_id = executeQuery($sql);
	
	//Refresh to the latest page
	header("Location: /viewquestion.php?id=$latest_id");
	die();
?>