<?php
	include 'qDBFunct.php';
	include 'aDBFunct.php';
	if (isset($_GET['up']) && isset($_GET['question']) && isset($_GET['id'])) {
		if ($_GET['question']==1){				
			$voted=voteUpQuestion($_GET['id'],$_GET['up']);
			$V = getQVote($_GET['id']);
			$nVote = mysqli_fetch_assoc($V);
			echo $nVote['qVote'];
		}else {
			$voted=voteUpAnswer($_GET['id'],$_GET['up']);
			$V = getAVote($_GET['id']);
			$nVote = mysqli_fetch_assoc($V);
			echo $nVote['aVote'];
		}
	}
?>