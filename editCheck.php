<?php
	include("questionAskForm.php");

	$db_con = mysql_connect("localhost", "root");
	if (!$db_con){
		die('Could not connect: '.mysql_error());
	}
	mysql_select_db("stackexchange", $db_con);

	if (!empty($_GET['qid'])) {
		$result = mysql_query("SELECT * FROM question_list WHERE qid=".$_GET["qid"]);	
		echo $result;
		$echoContent = $questionAskForm;
		if(mysql_num_rows($result) > 0) {
			$row = mysql_fetch_assoc($result);
			$echoContent = str_replace("{isEdit}", "?edit=true&qid=".$_GET["qid"], $echoContent);
			$echoContent = str_replace("{name}", $row["name"], $echoContent);
			$echoContent = str_replace("{email}", $row["email"], $echoContent);
			$echoContent = str_replace("{topic}", $row["topic"], $echoContent);
			$echoContent = str_replace("{question}", $row["question"], $echoContent);
			echo $echoContent;
		}
	} else {
		$echoContent = $questionAskForm;
		$echoContent = str_replace("{name}", "", $echoContent);
		$echoContent = str_replace("{email}", "", $echoContent);
		$echoContent = str_replace("{topic}", "", $echoContent);
		$echoContent = str_replace("{question}", "", $echoContent);
		echo $echoContent;
	}	
	mysql_close($db_con);	
?>