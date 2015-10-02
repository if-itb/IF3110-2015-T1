<?php
	include ('../controller.php');

	function makeQuestionPart($question) {
		echo(" <div class='question'> " .
			 " 		<div class='votes'>" . $question['vote'] . "<br> <span class='little-text'>Votes</span></div>" .
			 " 		<div class='answers'>" . getAnswerCount($question['id']) . "<br> <span class='little-text'>Answers</span></div>" .
			 " 		<div class='data'> " .
			 "			<a href='/question/" . $question['id'] . "'>" . 
			 " 			<div class='topic'>" . $question['topic'] . "</div>" .
			 "			</a>" .
			 " 			<div class='content'>" . getShortString($question['content']) . "</div>" .
			 " 			<div class='control'>asked by " . $question['name'] . " | edit | <a class='delete' onclick='deleteQuestion(" . $question['id'] . ")'>delete</a> </div>" .
			 " 		</div> " .
			 " </div> ");
	}

	function makeFullQList($page) {
		echo "<div class='list'>";
		echo "<div class='title'>Recently Asked Questions</div>";
		$questions = getListOfQuestion(); 
		foreach ($questions as $question) {
			makeQuestionPart($question);
		}
		echo "</div>";
	}

	function makeQuestionView($id) {
		$question = getQuestionbyId($id);

		echo("<div class='title'> " . $question['topic'] . " </div>" . 
			 " <div class='qview'> " .
			 " 		<div class='votes'>" . 
			 "			<a class='up_vote'></a>" .
			 "			<div class='vote_count'>" . $question['vote'] . "</div>" .
			 "			<a class='down_vote'></a>" .
			 "		</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $question['content'] . "</div>" .
			 " 			<div class='control'>asked by " . $question['name'] . " | edit | <a class='delete' onclick='deleteQuestion(" . $question['id'] . ")'>delete</a> </div>" .
			 " 		</div> " .
			 " </div> ");		
	}

	function makeAnswerView($answer) {
		echo(" <div class='aview'> " .
			 " 		<div class='votes'>" . 
			 "			<a class='up_vote'></a>" .
			 "			<div class='vote_count'>" . $answer['vote'] . "</div>" .
			 "			<a class='down_vote'></a>" .
			 "		</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $answer['content'] . "</div>" .
			 " 			<div class='control'>answered by " . $answer['name'] . "</div>" .
			 " 		</div> " .
			 " </div> ");		
	}

	function makeFullAList($id_q) {
		$count =  getAnswerCount($id_q);

		if ( $count != 0 ) {
			echo "<div class='title'>" . getAnswerCount($id_q) . " Answer(s)</div>";
			$answers = getAnswerbyQId($id_q); 
			foreach ($answers as $answer) {
				makeAnswerView($answer);
			}
		}
	}

?>