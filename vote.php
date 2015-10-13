<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: vote.php
// Keterangan	: Berisi kode php untuk memproses penambahan dan 
//				  pengurangan jumlah vote pada database


	include('ConnectDatabase.php');

	$ID= $_GET['id'];
	$Type= $_GET['type'];
	$Act= $_GET['act'];

	if($Type== "Questions")
	{
		if($Act== "Up") // Vote Up
		{
			$query_voteup = "UPDATE Questions SET Vote= Vote+1 WHERE ID = ".$ID;
			$exec_voteup = mysqli_query($conn,$query_voteup);
		} 

		if($Act == "Down") { // Vote Down
			$query_votedown = "UPDATE Questions SET Vote= Vote-1 WHERE ID = ".$ID;
			$exec_votedown = mysqli_query($conn,$query_votedown);
		}

		$query_updatevote = "SELECT Vote FROM Questions WHERE  ID = ".$ID;
		$result_updatevote = mysqli_query($conn, $query_updatevote);
		$row = mysqli_fetch_array($result_updatevote);
		echo $row["Vote"];
	} else { // answer
		if($Act == "Up") // Vote Up
		{
			$query_voteup = "UPDATE Answers SET Vote= Vote+1 WHERE ID = ".$ID;
			$exec_voteup = mysqli_query($conn,$query_voteup);
		}

		if ($Act == "Down")
		{ // Vote Down
			$query_votedown = "UPDATE Answers SET Vote= Vote-1 WHERE ID = ".$ID;
			$exec_votedown = mysqli_query($conn,$query_votedown);
		}

		$query_updatevote = "SELECT Vote FROM Answers WHERE  ID = ".$ID;
		$result_updatevote = mysqli_query($conn, $query_updatevote);
		$row = mysqli_fetch_array($result_updatevote);
		echo $row["Vote"];
	}
?>