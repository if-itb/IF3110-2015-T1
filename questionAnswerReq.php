<?php
	$db_con = mysql_connect("localhost","root");
	if (!$db_con){
		die('Could not connect: ' .mysql_error());
	}

	mysql_select_db("stackexchange", $db_con);
	$qid = $_GET["qid"];
	$date = date("Y-m-d H:i:s");

	$sql="INSERT INTO answer_list (qid, name, email, content, date)
	VALUES
	('$qid', '$_POST[name]','$_POST[email]','$_POST[content]', '$date')";

	if (!mysql_query($sql,$db_con))
	  {
	  die('Error: ' . mysql_error());
	  }

	$query = "SELECT COUNT(*) AS total FROM answer_list WHERE qid = ". $qid;
	$result = mysql_query($query, $db_con);
	$countAns = "";
	$row = mysql_fetch_assoc($result);
	$countAns = $row["total"];
	$countAns++;
	
	$sql = "UPDATE question_list SET answer='" . $countAns . "' WHERE qid=" . $qid;

	echo "1 answer added";
	mysql_close($db_con)
?>