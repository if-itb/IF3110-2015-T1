<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$question_id = $_GET["id"];
	$answer_id = $_GET["answer_id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "UPDATE `answer` SET `Vote` = `Vote` + 1 WHERE (`question_ID` = '$question_id') AND (`ID` = '$answer_id')";
	mysql_query($sql);
	mysql_close();
?>