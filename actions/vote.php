<?php 
	require('../includes/config.php');
	$category = $_GET['c'];
	$id = intVal($_GET['id']);
	$val = intVal($_GET['val']);
	if ($category == 'q'){ //pertanyaan
		$query = "select vote from question where id = '".$id."'";
		$data = mysql_query($query);
		$row = mysql_fetch_array($data);
		$currentVote = $row['vote'];
		$currentVote = $currentVote + $val;
		$query = "update question set vote = '".$currentVote."' where id = '".$id."'";
		mysql_query($query);
	} else if ($category == 'a') {
		$query = "select vote from answer where id = '".$id."'";
		$data = mysql_query($query);
		$row = mysql_fetch_array($data);
		$currentVote = $row['vote'];
		$currentVote = $currentVote + $val;
		$query = "update answer set vote = '".$currentVote."' where id = '".$id."'";
		mysql_query($query);
	}
	echo $currentVote;
?>