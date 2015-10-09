<?php
	
	require_once ("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	$id = $_GET['id'];

	$query = "DELETE FROM question WHERE id=$id";
	$result = mysql_query($query);
	if(!$result){
		die("Invalid query: ".mysql_error());
	}
	else{
		$query = "DELETE FROM answer WHERE id_question=$id";
		$result = mysql_query($query);
		if(!$result){
			die("Invalid query: ".mysql_error());
		}
		else{
			header("Location: index.php");
		}
	}

	mysql_close($connect);

?>