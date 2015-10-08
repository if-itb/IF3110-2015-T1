<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id = $_POST["id"];
	$id = mysql_real_escape_string($id);
	$name = $_POST["name"];
	$name = mysql_real_escape_string($name);
	$email = $_POST["email"];
	$email = mysql_real_escape_string($email);
	$topic = $_POST["topic"];
	$topic = mysql_real_escape_string($topic);
	$content = $_POST["content"];
	$content = mysql_real_escape_string($content);
	$sql = "UPDATE question SET username='$name', email='$email', topic='$topic', content='$content' WHERE id_question=". $id;

	if ($con->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $con->error;
	}
	mysqli_close($con);
?>