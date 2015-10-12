<?php 
	ob_start();
	require_once('connection.php');
	$query = "DELETE FROM question WHERE id=".$_GET['id'].";"; 
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
	$url = 'http://mystackexchange.dev';

	while (ob_get_status()) {
    	ob_end_clean();
	}

	header( "Location: $url" );