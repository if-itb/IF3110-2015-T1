<?php 
	ob_start();
	require_once('connection.php');
	$query = "UPDATE question
				SET topic='".$_POST["topic"]."', content='".$_POST["content"]."', date='".date("Y-m-d h:i:s")."', name='".$_POST["name"]."', email='".$_POST["email"]."' WHERE id=".$_GET['id'].";";
	//echo $query;
	
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
	$url = 'http://mystackexchange.dev/question.php?id='.$_GET['id'];

	while (ob_get_status()) {
    	ob_end_clean();
	}

	header( "Location: $url" );