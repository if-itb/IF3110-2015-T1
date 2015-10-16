<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$name = $_POST["name"];
	$name = mysql_real_escape_string($name);
	$email = $_POST["email"];
	$email = mysql_real_escape_string($email);
	$topic = $_POST["topic"];
	$topic = mysql_real_escape_string($topic);
	$content = $_POST["content"];
	$content = mysql_real_escape_string($content);
	$sql = "INSERT INTO question (username, email, topic,  content) 
	VALUES ('$name', '$email', '$topic', '$content')";

	if ($con->query($sql) === TRUE) {
	    header("Location: index.php");
		exit;
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}
	mysqli_close($con);
?>