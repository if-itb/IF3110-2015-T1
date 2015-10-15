<?php
	$id_ans = intval($_GET['id_ans']);

	require 'connect.php';
	require 'dbfunction.php';

	$update = "UPDATE answer SET vote_ans=vote_ans+1 WHERE id_ans=$id_ans;";
	if ($conn->query($update) === TRUE) {
		//do nothing
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$vote = GetVoteAns($conn,$id_ans);

	echo "<p>".$vote."</p>"
?>