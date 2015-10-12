<?php 
	require_once('connection.php');
	$query = "UPDATE answer
    SET vote = ".$_GET['vote']."
    WHERE qid = ".$_GET['qid']."AND id = ".$_GET['id'].";"  ;
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
