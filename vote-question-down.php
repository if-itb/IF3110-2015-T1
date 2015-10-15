<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$question_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "UPDATE `question` SET `Vote` = `Vote` - 1 WHERE (ID = $question_id)";
	mysql_query($sql);
	mysql_close();
?>