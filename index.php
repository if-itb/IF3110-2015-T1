<?php
	require_once 'tools/database/db.php';

	$sql = "
		SELECT question.*, count(answerId) AS number_of_answers 
		FROM question LEFT JOIN answer
		ON question.questionId = answer.questionId
		GROUP BY question.questionId
		ORDER BY questionId DESC
		";

	$questions = getResult($sql);

	require_once 'view/home.php';
?>