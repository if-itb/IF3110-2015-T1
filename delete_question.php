<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    echo("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "DELETE FROM `question` WHERE question_id=".$_GET["q_id"];
	echo $sql;
	mysqli_query($conn,$sql);

	mysqli_close($conn);
	header("Location: index.php"); /* Redirect browser */
	exit();
?>