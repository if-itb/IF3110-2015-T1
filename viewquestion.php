<?php
	require_once 'tools/database/db.php';

	$questionId = $_GET['id'];

	$sql = "
		SELECT *
		FROM question
		WHERE questionId = $questionId";

	$question = getResult($sql);

	//It is guaranteed to return only one row, as questionid is primary key
	$question = $question[0];

	$sql = "
		SELECT answerId, votes, content, answerer, email, time 
		FROM answer
		WHERE answer.questionId = $questionId";

	$answers = getResult($sql);

	require_once 'view/question.php';

?>