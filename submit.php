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
	$sql = "INSERT INTO `question` (`name`, `email`, `topic`, `content`, `vote`, `date_created`) VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["topic"]."','".$_POST["content"]."',0,now())";

	mysqli_query($conn,$sql);
	mysqli_close($conn);

	header("Location: index.php"); /* Redirect browser */
	exit();
?>