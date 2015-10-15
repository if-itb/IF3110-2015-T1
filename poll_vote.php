<?php 
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stack_exchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn)
	{
    	die("Connection failed: " . mysqli_connect_error());
	}

	$ID = $_GET['id'];
	$type = $_GET['type'];
	$action = $_GET['action'];

	if($type== "Q")
	{
		if($action== "Up") // Vote Up
		{
			$query_voteup = "UPDATE question SET Vote= Vote+1 WHERE ID = ".$ID;
			$exec_voteup = mysqli_query($conn,$query_voteup);
		} 

		if($action == "Down") { // Vote Down
			$query_votedown = "UPDATE question SET Vote= Vote-1 WHERE ID = ".$ID;
			$exec_votedown = mysqli_query($conn,$query_votedown);
		}

		$query_updatevote = "SELECT Vote FROM question WHERE  ID = ".$ID;
		$result_updatevote = mysqli_query($conn, $query_updatevote);
		$row = mysqli_fetch_array($result_updatevote);
		echo $row["Vote"];
	} else { // answer
		if($action == "Up") // Vote Up
		{
			$query_voteup = "UPDATE answer SET Vote= Vote+1 WHERE Ans_ID = ".$ID;
			$exec_voteup = mysqli_query($conn,$query_voteup);
		}

		if ($action == "Down")
		{ // Vote Down
			$query_votedown = "UPDATE answer SET Vote= Vote-1 WHERE Ans_ID = ".$ID;
			$exec_votedown = mysqli_query($conn,$query_votedown);
		}

		$query_updatevote = "SELECT Vote FROM answer WHERE  Ans_ID = ".$ID;
		$result_updatevote = mysqli_query($conn, $query_updatevote);
		$row = mysqli_fetch_array($result_updatevote);
		echo $row["Vote"];
	}

?>