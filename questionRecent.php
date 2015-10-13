<?php
	include("questionDiv.php");		

	$db_con = mysql_connect("localhost", "root");
	if (!$db_con){
		die('Could not connect: '.mysql_error());
	}
	mysql_select_db("stackexchange", $db_con);

	$result = mysql_query("SELECT * FROM question_list ORDER BY qid DESC");
	
	if(mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			$echoQuestion = $questionDiv;
			$text = $row["question"];
			$echoQuestion = str_replace("{qid}", $row["qid"], $echoQuestion);
			$echoQuestion = str_replace("{name}", $row["name"], $echoQuestion);
			$echoQuestion = str_replace("{topic}", $row["topic"], $echoQuestion);
			$truncated = (strlen($text) > 150) ? substr($text, 0, 150)."..." : $text;
			$echoQuestion = str_replace("{question}", $truncated, $echoQuestion);
			$echoQuestion = str_replace("{vote}", $row["vote"], $echoQuestion);
			$echoQuestion = str_replace("{answer}", $row["answer"], $echoQuestion);
			echo $echoQuestion;
		}
	}
	else{
			echo "No Question"; }
	mysql_close($db_con);
?>