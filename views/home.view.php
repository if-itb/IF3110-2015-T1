<?php 
	require_once("controllers/home.controller.php");
	
	function showQuestionList() {
		echo "<div class=\"center\">";
		$questionList = retrieveQuestions();
		for($i = 0; $i < sizeof($questionList); $i++) {
			echo "<hr>";
			echo "<span id=\"vote\"><br><span class=\"number\">" . $questionList[$i]["vote"] . "</span><br> Votes </span>";
			echo "<span id=\"answer\"><br><span class=\"number\">" . $questionList[$i]["answer"] . "</span><br> Answers</span>";
			echo "<span id=\"question\"><a href=\"question.php?q_id=" . $questionList[$i]["id"] . "\" class=\"question-title\">" . $questionList[$i]["topic"] . "</a><br>";
			if (strlen($questionList[$i]["content"])>700)
				echo substr($questionList[$i]["content"],0,700) . "...<br><br>";
			else 
				echo $questionList[$i]["content"] . "<br><br>";
			echo "<span class=\"question-info\">asked by <span class=\"author\">" . $questionList[$i]["name"] .
			"</span> | <a href=\"edit.php?q_id=" . $questionList[$i]["id"] . "\" class=\"edit-question\">edit</a> | 
			<a href=\"controllers/delete-question.controller.php/?q_id=" . $questionList[$i]["id"] . "\" class=\"delete-question\" onclick=\"return deleteConfirmation(" . $questionList[$i]["id"] . ")\">delete</a><br></span></span>"; 
		}
		echo "</div>";
	}
?>