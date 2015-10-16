<?php 
	require('includes/config.php'); 
	$q_id = $_GET['id'];
	$query1 = "delete from question where id = '".$q_id."'";
	$query2 = "delete from answer where q_id = '".$q_id."'";
	mysql_query($query1);
	mysql_query($query2);
	header("Location: question_list.php");
?>