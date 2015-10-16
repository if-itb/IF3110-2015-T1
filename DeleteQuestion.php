<?php
	function Home($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301:302); 
		exit(); 
	}

	include('dataBase.php'); 
	$ID = $_GET['id'];
	$input = "DELETE FROM questions WHERE ID = $ID"; 
	$question = mysqli_query($conn, $input); 
	if (!$question) { 
		die("Invalid query: ".mysql_error()); 

	}
	else{
		header("Location: home.php");
	}
	$conn -> close(); 

?>