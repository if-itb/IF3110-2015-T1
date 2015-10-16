<?php
	require_once 'tools/database/db.php';

	$questionid = $_GET['id'];

	$sql = "
		SELECT *
		FROM question
		WHERE questionId = $questionid";

	$question = getResult($sql);

	//It is guaranteed to return only one row, as questionid is primary key
	$question = $question[0];

	require_once 'view/edit.php';

?>