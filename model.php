<?php
	include ('../controller.php');

	function makeQuestionPart($question) {
		echo(" <div class='question'> " .
			 " 		<div class='votes'>" . $question['vote'] . "</div>" .
			 " 		<div class='answers'>" . getAnswerCount($question['id']) . "</div>" .
			 " 		<div class='data'> " .
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

	function makeQuestionView($id) {
		$question = getQuestionbyId($id);

		echo( $question['topic'] . 
			 " <div class='qview'> " .
			 " 		<div class='votes'>" . $question['vote'] . "</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $question['content'] . "</div>" .
			 " 			<div class='control'>asked by " . $question['name'] . " | edit | delete</div>" .
			 " 		<div> " .
			 " </div> ");		
	}

	function makeAnswerView($answer) {
		echo(" <div class='aview'> " .
			 " 		<div class='votes'>" . $answer['vote'] . "</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $answer['content'] . "</div>" .
			 " 			<div class='control'>answered by " . $answer['name'] . "</div>" .
			 " 		<div> " .
			 " </div> ");		
	}

	function makeFullAList($id_q) {
		$answers = getAnswerbyQId($id_q); 
		foreach ($answers as $answer) {
			makeAnswerView($answer);
		}
	}

?>