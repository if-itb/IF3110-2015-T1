<?php 
	require_once('connection.php');
	$query = "UPDATE question
    SET vote = ".$_GET['vote']."
    WHERE id = ".$_GET['id'].";" ; 
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
