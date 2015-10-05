<?php 
	require_once("controllers/index.controller.php");
	
	function showQuestionList() {
		$questionList = retrieveQuestions();
		for($i = 0; $i < sizeof($questionList); $i++) {
			echo "<hr>";
			echo $questionList[$i]["vote"] . " votes <br>";
			echo $questionList[$i]["answer"] . " answers <br>";
			echo $questionList[$i]["topic"] . "<br>";
			echo "asked by " . $questionList[$i]["name"] . " | edit | delete <br>"; 
		}
	}
?>