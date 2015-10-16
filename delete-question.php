<?php

	require_once("connection.php");


	$qid = $_GET['id'];

	$q_query = "DELETE FROM question WHERE q_id=" .$qid. ";";
	$result = mysqli_query($conn, $q_query);
	if(!$result){
		die("Invalid query: ".mysqli_error());
	} else {
		$a_query = "DELETE FROM answer WHERE ans_q_id=" .$qid. ";";
		if (mysqli_query($conn, $q_query) && mysqli_query($conn, $a_query)) {
			echo "<script> window.open('index.php', '_self') </script>";
		}

	}
?>