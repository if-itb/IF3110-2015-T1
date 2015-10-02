<?php
	include ('../controller.php');

	function makeQuestionPart($question) {
		echo "<a href='/question/" . $question['id'] . "'>";
		echo(" <div class='question'> " .
			 " 		<div class='votes'>" . $question['vote'] . "<br> <span class='little-text'>Votes</span></div>" .
			 " 		<div class='answers'>" . getAnswerCount($question['id']) . "<br> <span class='little-text'>Answers</span></div>" .
			 " 		<div class='data'> " .
			 " 			<div class='topic'>" . $question['topic'] . "</div>" .
			 " 			<div class='control'>asked by " . $question['name'] . " | edit | delete</div>" .
			 " 		</div> " .
			 " </div> ");
		echo "</a>";
	}

	function makeFullQList($page) {
		echo "<div class='list'>";
		echo "<h3>Recently Asked Questions</h3>";
		$questions = getListOfQuestionLimited($page); 
		foreach ($questions as $question) {
			makeQuestionPart($question);
		}
		echo "</div>";
	}

	function makeQuestionView($id) {
		$question = getQuestionbyId($id);

		echo("<h3> " . $question['topic'] . " </h3>" . 
			 " <div class='qview'> " .
			 " 		<div class='votes'>" . $question['vote'] . "</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $question['content'] . "</div>" .
			 " 			<div class='control'>asked by " . $question['name'] . " | edit | delete</div>" .
			 " 		</div> " .
			 " </div> ");		
	}

	function makeAnswerView($answer) {
		echo(" <div class='aview'> " .
			 " 		<div class='votes'>" . $answer['vote'] . "</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $answer['content'] . "</div>" .
			 " 			<div class='control'>answered by " . $answer['name'] . "</div>" .
			 " 		</div> " .
			 " </div> ");		
	}

	function makeFullAList($id_q) {
		$answers = getAnswerbyQId($id_q); 
		foreach ($answers as $answer) {
			makeAnswerView($answer);
		}
	}

?>