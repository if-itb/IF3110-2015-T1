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
			 " 			<div class='control'>asked by " . $question['name'] . " | <a class='edit' href='/edit/question/" . $question['id'] . "'> edit </a> | <a class='delete' onclick='deleteQuestion(" . $question['id'] . ")'>delete</a> </div>" .
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
		if ( !empty($question) ) {
			echo("<div class='title'> " . $question['topic'] . " </div>");

			if ( $question['vote'] >= 0 ) {
				echo(" <div class='qview'> ");
			} else {
				echo(" <div class='qview negative'> ");
			}

			echo(" 		<div class='votes'>" . 
				 "			<a class='up_vote' onclick=\"voting(" . $question['id'] . ", 'up', 'question')\"></a>" .
				 "			<div id='vote_count_q_" . $question['id'] . "' class='vote_count'>" . $question['vote'] . "</div>" .
				 "			<a class='down_vote' onclick=\"voting(" . $question['id'] . ", 'down', 'question')\"></a>" .
				 "		</div>" .
				 " 		<div class='data'> " .
				 " 			<div class='content'>" . $question['content'] . "</div>" .
				 " 			<div class='control'>asked by " . $question['name'] . " at " . $question['date_created'] . " | <a class='edit' href='/edit/question/" . $question['id'] . "'> edit </a> | <a class='delete' onclick='deleteQuestion(" . $question['id'] . ")'>delete</a> </div>" .
				 " 		</div> " .
				 " </div> ");	
		} else {
			redirectTo("/home");
		}	
	}

	function makeAnswerView($answer) {
		if ( $answer['vote'] >= 0 ) {
			echo(" <div class='aview'> ");
		} else {
			echo(" <div class='aview negative'> ");
		}
		echo(" 		<div class='votes'>" . 
			 "			<a class='up_vote' onclick=\"voting(" . $answer['id'] . ", 'up', 'answer')\"></a>" .
			 "			<div id='vote_count_a_" . $answer['id'] . "' class='vote_count'>" . $answer['vote'] . "</div>" .
			 "			<a class='down_vote' onclick=\"voting(" . $answer['id'] . ", 'down', 'answer')\"></a>" .
			 "		</div>" .
			 " 		<div class='data'> " .
			 " 			<div class='content'>" . $answer['content'] . "</div>" .
			 " 			<div class='control'>answered by " . $answer['name'] . " at " . $answer['date_created'] . " </div>" .
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