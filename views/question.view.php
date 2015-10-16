<?php 
	require_once("controllers/question.controller.php");
	
	function showQuestion($id) {
		$question = selectQuestion($id);
		echo "<h2>";
		echo "<a href=\"question.php?q_id=" . $id . "\" class=\"question-title-big\">" . $question["topic"] . "</a></h2><hr>";
		echo "<span id=\"question-vote\"><br>";
		echo "<div onclick=\"vote(". $id . ",'question','up')\" class=\"arrow-up\"></div><br>";
		echo "<span id=\"questvote\" class=\"question-number\">" . $question["vote"] . "</span><br><br>";
		echo "<div onclick=\"vote(". $id . ",'question','down')\"  class=\"arrow-down\"></div><br></span>";
		echo "<span id=\"question-content\">";
		echo nl2br($question["content"]) . "<br><br><br>";
		echo "<span class=\"question-info\">asked by <span class=\"author\">" . $question["email"] .
			"</span> at " . $question["date_created"] . " ";
		if ($question["date_edited"]!=null) {
			echo " edited at " . $question["date_edited"] . " ";
		}
		echo "<a href=\"edit.php?q_id=" . $question["id"] . "\" class=\"edit-question\"> edit</a> | 
		<a href=\"controllers/delete-question.controller.php/?q_id=" . $question["id"] . "\" class=\"delete-question\" onclick=\"return deleteConfirmation(" . $question["id"] . ")\">delete</a><br></span></span>";
		echo "</span><br><br>";
		echo "<br>";
		echo "<h2>" . $question["answer"] . " Answers</h2><hr>";
	}

	function showAnswers($q_id) {
		$answerList = retrieveAnswers($q_id);
		if (sizeof($answerList)==0) {
			echo "No answer. <br><br><br><hr><br>";
		}
		for($i = 0; $i < sizeof($answerList); $i++) {		
			echo "<span id=\"question-vote\"><br>";
			echo "<div onclick=\"vote(". $answerList[$i]["id"]  . ",'answer','up')\" class=\"arrow-up\"></div><br>";
			echo "<span id=\"ansvote-" . $answerList[$i]["id"] . "\"class=\"question-number\">" . $answerList[$i]["vote"] . "</span><br><br>";
			echo "<div onclick=\"vote(". $answerList[$i]["id"] . ",'answer','down')\" class=\"arrow-down\"></div><br></span>";
			echo "<span id=\"question-content\">";
			echo nl2br($answerList[$i]["content"]) . "<br><br><br>";
			echo "<span class=\"question-info\">answered by <span class=\"author\">" . $answerList[$i]["email"] .
			"</span> at " . $answerList[$i]["date_created"] . " </span>";
			echo "</span><br><br>";
			echo "<hr>";
		}
	}
?>