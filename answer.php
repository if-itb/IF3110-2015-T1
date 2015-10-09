<?php 
	ob_start();
	require_once('connection.php');
	$query = "INSERT INTO answer(
            vote, content, date, name, email, qid)
    VALUES (0, '".$_POST["content"]."', '".date("Y-m-d h:i:s")."', '".$_POST["name"]."', '".$_POST["email"]."',".$_GET["qid"].");"; 
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
	$url = 'http://mystackexchange.dev/question.php?id='.$_GET["qid"];
	while (ob_get_status()) {
    	ob_end_clean();
	}

	header( "Location: $url" );