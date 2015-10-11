<?php 
	require_once("controllers/index.controller.php");
	
	function showQuestionList() {
		echo "<div class=\"center\">";
		$questionList = retrieveQuestions();
		for($i = 0; $i < sizeof($questionList); $i++) {
			echo "<hr>";
			echo "<span id=\"vote\"><br><span class=\"number\">" . $questionList[$i]["vote"] . "</span><br> Votes </span>";
			echo "<span id=\"answer\"><br><span class=\"number\">" . $questionList[$i]["answer"] . "</span><br> Answers</span>";
			echo "<span id=\"question\"><span class=\"question-title\">" .$questionList[$i]["topic"] . "</span><br>";
			echo $questionList[$i]["content"] . "<br><br>";
			echo "<span class=\"question-info\">asked by <span class=\"author\">" . $questionList[$i]["name"] . "</span> | <a class=\"edit-question\">edit</a> | <a class=\"delete-question\">delete</a><br></span></span>"; 
		}
		echo "</div>";
	}
?>