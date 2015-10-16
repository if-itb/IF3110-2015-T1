<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$question_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	//echo "$question_id";
	$sql = "DELETE FROM `question` WHERE (ID = 	$question_id)";
	$sqlans = "DELETE FROM `answer` WHERE (question_ID = $question_id)";
	mysql_query($sql);
	mysql_query($sqlans);
	mysql_close();
	header("Location: /WBD/index.php");
?>