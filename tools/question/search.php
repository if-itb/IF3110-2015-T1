<?php
	require_once '../database/db.php';

	$search = $_GET["search"];

	//Well, seems like this is prone to SQL injection
	$sql = "
		SELECT * 
		FROM question
		WHERE topic LIKE '%$search%' OR content LIKE '%$search%'
	";

	//Insert new question, and get the latest question id
	$questions = getResult($sql);
	
	//Refresh to the latest page
	require_once '../../view/searchresult.php';
?>