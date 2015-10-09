<?php 
	ob_start();
	require_once('connection.php');
	$query = "INSERT INTO question(
            topic, vote, content, date, name, email)
    VALUES ('".$_POST["topic"]."', 0, '".$_POST["content"]."', '".date("Y-m-d h:i:s")."', '".$_POST["name"]."', '".$_POST["email"]."');"; 
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
	$url = 'http://mystackexchange.dev';

	while (ob_get_status()) {
    	ob_end_clean();
	}

	header( "Location: $url" );