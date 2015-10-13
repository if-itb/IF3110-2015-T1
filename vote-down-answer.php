<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$quest_id = $_GET["id"];
	$ans_id = $_GET["id-ans"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "UPDATE `answer` SET `vote_answer` = `vote_answer` - 1 WHERE (`question_id` = $quest_id) AND (`answer_id` = $ans_id)";
	mysql_query($sql);
	mysql_close();
?>