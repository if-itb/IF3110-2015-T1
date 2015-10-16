<?php
	include("answerDiv.php");

	$db_con = mysql_connect("localhost", "root");
	$query = "";
	
	if (!$db_con){
		die('Could not connect: '.mysql_error());
	}

	mysql_select_db("stackexchange", $db_con);

	$sql_query = "SELECT * FROM answer_list " . $query . "WHERE qid=" . $_GET["qid"] . " ORDER BY vote DESC";
	$result = mysql_query($sql_query);
	if(mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			$echoAnswer = $answerDiv;
			$echoAnswer = str_replace("aid", $row["aid"], $echoAnswer);
			$echoAnswer = str_replace("{name}", $row["name"], $echoAnswer);
			$echoAnswer = str_replace("{answerContent}", $row["content"], $echoAnswer);
			$echoAnswer = str_replace("{votes}", $row["vote"], $echoAnswer);
			$echoAnswer = str_replace("{date}", $row["date"], $echoAnswer);
			echo $echoAnswer;
		}
	}
	else{
			echo "No Answer"; }
	mysql_close($db_con);

?>