<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$quest_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "DELETE FROM `question` WHERE (question_id = $quest_id)";
	mysql_query($sql);
	mysql_close();
	header("Location: /Tubes1/index.php");
?>