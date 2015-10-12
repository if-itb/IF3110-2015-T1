<?php 
	require_once("controllers/question.controller.php");
	
	function showQuestion($id) {
		$question = selectQuestion($id);
		echo "<h2><a href=\"question.php?q_id=" . $id . "\" class=\"question-title-big\">" . $question["topic"] . "</a></h2><hr>";
		echo "<span id=\"question-vote\"><br><span class=\"question-number\">" . $question["vote"] . "</span><br> Votes </span>";
		echo "<span id=\"question-content\">";
		echo $question["content"] . "<br><br><br>";
		echo "<span class=\"question-info\">asked by <span class=\"author\">" . $question["name"] .
			"</span> at " . $question["date_created"] . " ";
		if ($question["date_edited"]!=null) {
			echo " edited at " . $question["date_edited"] . " ";
		}
		echo "<a href=\"edit.php?q_id=" . $question["id"] . "\" class=\"edit-question\"> edit</a> | 
		<a class=\"delete-question\" onclick=\"deleteConfirmation(" . $question["id"] . ")\">delete</a><br></span></span>";
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
			echo "<span id=\"question-vote\"><br><span class=\"question-number\">" . $answerList[$i]["vote"] . "</span><br> Votes </span>";
			echo "<span id=\"question-content\">";
			echo $answerList[$i]["content"] . "<br><br><br>";
			echo "<span class=\"question-info\">answered by <span class=\"author\">" . $answerList[$i]["name"] .
				"</span> | <a class=\"edit-question\">edit</a> | 
				<a class=\"delete-question\" onclick=\"deleteConfirmation(" . $answerList[$i]["id"] . ")\">delete</a><br></span></span>";
			echo "</span><br><br>";
			echo "<hr>";
		}
	}
?>