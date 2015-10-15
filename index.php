<?php
	require_once 'tools/db.php';

	$sql = "
		SELECT question.*, count(answerId) AS number_of_answers 
		FROM question LEFT JOIN answer
		ON question.questionId = answer.questionId
		GROUP BY question.questionId;
		";

	$questions = getResult($sql);
	foreach($questions as $question){
		echo "Question id: " . $question["questionId"] . "<br>";
		echo "Topic: " . $question["topic"] . "<br>";
		echo "Content: " . $question["content"] . "<br>";
		echo "Votes: " . $question["votes"] . "<br>";
		echo "Answers: " . $question["number_of_answers"] . "<br>";
		echo "Asked by: " . $question["asker"] . "<br>";
		echo "<hr>";
	}
?>