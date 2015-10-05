<?php 
	require_once("controllers/index.controller.php");
	
	function showQuestionList() {
		$questionList = retrieveQuestions();
		for($i = 0; $i < sizeof($questionList); $i++) {
			echo "<hr>";
			echo $questionList[$i]["vote"] . " votes <br>";
			echo "0 answers <br>";
			echo $questionList[$i]["content"] . "<br>";
			echo "asked by " . $questionList[$i]["name"] . " | edit | delete <br>"; 
		}
	}
?>