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
	$q_id = $_GET["q_id"];
	$sql = "UPDATE `question` SET `name`='".$_POST["name"]."', `email`='".$_POST["email"]."', `topic`='".$_POST["topic"]."', `content`='".$_POST["content"]."' WHERE question_id=$q_id";
	if(mysqli_query($conn,$sql)) echo "yes";
	mysqli_close($conn);

	header("Location: index.php"); /* Redirect browser */
	exit();
?>