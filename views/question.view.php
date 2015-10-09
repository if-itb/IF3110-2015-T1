<?php 
	require_once("controllers/question.controller.php");
	
	function showQuestion($id) {
		$question = selectQuestion($id);
		echo "<hr>";
		echo "<h2>" . $question["topic"] . "</h2><hr>";
		echo "Content: " . "<br>" . $question["content"] . "<br>";
		echo $question["vote"] . " votes <br>";
		echo $question["answer"] . " answers <br>";
		echo "asked by " . $question["name"] . " | edit | delete <br>"; 
	}
?>