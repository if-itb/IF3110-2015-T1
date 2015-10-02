<?php
	include ('../controller.php');

	$questions = getListOfQuestionLimited(0); 
	foreach ($questions as $question) {
		echo $question['topic'];
		echo "<br>";
		echo getAnswerCount($question['id']);
	}

?>

