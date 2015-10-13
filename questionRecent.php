<?php
	include("questionDiv.php");		

	$db_con = mysql_connect("localhost", "root");
	$query = "";
	
	if (!$db_con){
		die('Could not connect: '.mysql_error());
	}
	
	if(!empty($_GET["search"])) {
		$query = "WHERE topic LIKE '%" . $_GET["search"] . "%' OR question LIKE '%" . $_GET["search"] . "%'";
	}


	mysql_select_db("stackexchange", $db_con);

	$sql_query = "SELECT * FROM question_list " . $query . " ORDER BY qid DESC";
	$result = mysql_query($sql_query);
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