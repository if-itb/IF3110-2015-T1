<?php
	
	require_once ("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	
	$id = $_GET["id"];
	$act = $_GET["act"];
	$type = $_GET["type"];

	$query = sprintf("SELECT votes FROM %s WHERE id=%d",mysql_escape_string($type),mysql_escape_string($id));
	$result = mysql_query($query, $connect);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$vote = $row['votes'];

	if($act == "up"){
		$vote += 1;
		$query = sprintf("UPDATE %s SET votes=$vote WHERE id=%d",mysql_escape_string($type),mysql_escape_string($id));
	}
	else{
		$vote -= 1;
		$query = sprintf("UPDATE %s SET votes=$vote WHERE id=%d",mysql_escape_string($type),mysql_escape_string($id));
	}

	$result = mysql_query($query, $connect);
	if(!$result){
		die('Invalid query: '.mysql_error());
	}

	$vote = sprintf("SELECT votes FROM %s WHERE id=%d",mysql_escape_string($type),mysql_escape_string($id));
	$result = mysql_query($vote, $connect);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	echo $row['votes'];
	//echo "sue";

	mysql_close($connect);

?>