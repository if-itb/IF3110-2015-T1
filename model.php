<?php
	include ('../controller.php');

	function makeQuestionPart($question) {
		echo(" <div class='question'> " .
			 " 		<div class='votes'>" . $question['vote'] . "</div>" .
			 " 		<div class='answers'>" . getAnswerCount($question['id']) . "</div>" .
			 " 		<div class='question'> " .
			 " 			<div class='topic'>" . $question['topic'] . "</div>" .
			 " 			<div class='control'>asked by " . $question['name'] . " | edit | delete</div>" .
			 " 		<div> " .
			 " </div> ");
	}

	function makeFullQList($page) {
		$questions = getListOfQuestionLimited($page); 
		foreach ($questions as $question) {
			makeQuestionPart($question);
		}
	}
?>