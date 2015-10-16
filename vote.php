<?php

	require_once("connection.php");

	$id = $_GET['id'];
	$table = $_GET['table'];
	$value = $_GET['value'];

	if ($table == "question") {
		$query = "UPDATE question SET q_vote=q_vote+".$value." WHERE q_id=".$id.";";
	} else if ($table == "answer") {
		$query = "UPDATE answer SET ans_vote=ans_vote+".$value." WHERE ans_id=".$id.";";
	}
	if (mysqli_query($conn, $query)) {
		 echo "Vote saved";
	} else {
	    echo "Error voting: " . mysqli_error($conn);
	}
?>