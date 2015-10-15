<?php
	$id = intval($_GET['id']);

	require 'connect.php';
	require 'dbfunction.php';

	$update = "UPDATE question SET vote=vote-1 WHERE id=$id;";
	if ($conn->query($update) === TRUE) {
		//do nothing
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$vote = GetVote($conn,$id);

	echo "<p>".$vote."</p>"
?>