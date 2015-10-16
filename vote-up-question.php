<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$quest_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "UPDATE `question` SET `vote_question` = `vote_question` + 1 WHERE (question_id = $quest_id)";
	mysql_query($sql);
	mysql_close();
?>