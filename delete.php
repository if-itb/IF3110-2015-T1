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

	$QID = $_GET['id'];

	$sql_delete_answer = "DELETE FROM answer WHERE Que_ID = '$QID'";
	$result_delete_answer = mysqli_query($conn, $sql_delete_answer);
	$sql_delete_que = "DELETE FROM question WHERE ID = '$QID'";
	$result_delete_que = mysqli_query($conn, $sql_delete_que);

	mysqli_close($conn);
	header("Location: index.php");
?>