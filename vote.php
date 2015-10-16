<?php

	$id = $_GET["id"];
	$vType = $_GET["vType"];
	$conType = $_GET["conType"];

	$db_con = mysql_connect("localhost", "root");
	if (!$db_con) {
		die('Could not connect: '.mysql_error());
	}
	mysql_select_db("stackexchange", $db_con);
 
	$sql = "";
	$value = "";
	if($conType == "question"){
		if($vType == "vUp"){
			$value = "vote = vote + 1 ";
		}else{
			$value = "vote = vote - 1 ";
		}
		$sql = "UPDATE question_list SET " . $value . " WHERE qid=" . $id;
		$query = "SELECT * FROM question_list WHERE qid=" . $id;
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}else if($conType == "answer"){
		if($vType == "vUp"){
			$value = "vote = vote + 1 ";
		}else{
			$value = "vote = vote - 1 ";
		}
		$sql = "UPDATE answer_list SET " . $value . " WHERE aid=" . $id;
		$query = "SELECT * FROM answer_list WHERE aid=" . $id;
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);	
	}
	if (mysql_query($sql, $db_con)) {
	} else {
			echo "Error updating question: " . mysql_error($db_con);
	}
	echo $row["vote"];
?>