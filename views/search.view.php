<?php 
	require_once("controllers/search.controller.php");
	
	function showResult() {
		echo "<div class=\"center\">";
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$keyword = $_GET['search'];
			$questionList = getSearchResult($keyword);
			if (sizeof($questionList)==0) {
				echo "<div style=\"text-align: left\">No result found.</div>";
			}
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
				<a href=\"\"class=\"delete-question\" onclick=\"deleteConfirmation(" . $questionList[$i]["id"] . ")\">delete</a><br></span></span>"; 
			}
			echo "</div>";
		}
	}
?>