<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$quest_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql1 = "DELETE FROM `question` WHERE (question_id = $quest_id)";
	mysql_query($sql1);
	$sql2 = "DELETE FROM `answer` WHERE (question_id = $quest_id)";
	mysql_query($sql2);
	mysql_close();
	header("Location: /tugasWBD/index.php");
?>