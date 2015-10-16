<?php
	
	include ('database.php'); 

	$ID = $_GET['id']; 
	$UpBut = $_GET['U']; 
	$quest = $_GET['Q']; 


	if ($quest == 'true') {
		$input = "SELECT ID, Vote FROM questions WHERE ID = $ID"; 
		$question = mysqli_query($conn, $input); 
		while ($row = mysqli_fetch_assoc($question)) { 
			if ($UpBut == 'true') 
				$newVote = $row["Vote"] + 1; 
			else 
				$newVote = $row["Vote"] - 1; 
		}
		$update = "UPDATE questions SET Vote = '$newVote' WHERE ID= '$ID' "; 
		$result = mysqli_query($conn, $update);

	}
	else { 
		$input1 = "SELECT ID, Vote FROM answers WHERE ID = $ID"; 
		$answer = mysqli_query($conn, $input1); 
		while ($row = mysqli_fetch_assoc($answer)) { 
			if ($UpBut == 'true') 
				$newVote = $row["Vote"] + 1; 
			else 
				$newVote = $row["Vote"] - 1; 
		}
		$update1 = "UPDATE answers SET Vote = '$newVote' WHERE ID= '$ID' "; 
		$result = mysqli_query($conn, $update1);

	}

	echo "".$newVote; 

	mysqli_close($conn);

?>