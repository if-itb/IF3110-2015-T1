<?php
	require_once '../database/db.php';
	$questionid = $_GET['id'];

	//Delete all the answers of this question from database first
	$sql = "
		DELETE FROM answer
		WHERE questionId=$questionid
	";

	executeQuery($sql);

	//Delete the question itself
	$sql = "
		DELETE FROM question
		WHERE questionId=$questionid
	";

	executeQuery($sql);

	header("Location: /index.php");
	die();
?>