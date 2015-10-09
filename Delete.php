<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "question_answer";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	$db = mysql_select_db($dbname, $conn);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$ID = $_GET['id'];
	$sql = "DELETE FROM question WHERE Q_id=$ID";
	$question = mysql_query($sql, $conn);
	if(!$question){
		die("Invalid query: ".mysql_error());
	}
	else{
		header("Location: index.php");
	}
?>