<?php
	include("singlequestionDiv.php");
	$db_con = mysql_connect("localhost", "root");
	
	if (!$db_con){
		die('Could not connect: '.mysql_error());
	}
	
	mysql_select_db("stackexchange", $db_con);

	$query = "SELECT * FROM question_list WHERE qid=" . $_GET["qid"];
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			$echoQuestion = $singlequestionDiv;
			$echoQuestion = str_replace("{qid}", $row["qid"], $echoQuestion);
			$echoQuestion = str_replace("{name}", $row["name"], $echoQuestion);
			$echoQuestion = str_replace("{topic}", $row["topic"], $echoQuestion);
			$echoQuestion = str_replace("{content}", $row["question"], $echoQuestion);
			$echoQuestion = str_replace("{answer}", $row["answer"], $echoQuestion);
			$echoQuestion = str_replace("{votes}", $row["vote"], $echoQuestion);
			$echoQuestion = str_replace("{datetime}", $row["date_time"], $echoQuestion);
			echo $echoQuestion;
		}
	}
	else{
			echo "No Question"; }
	mysql_close($db_con);
?>