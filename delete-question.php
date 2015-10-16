<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql = "UPDATE question SET username='$name', email='$email', topic='$topic', content='$content' WHERE id_question=". $id;

	if ($con->query($sql) === TRUE) {
	    header("Location: index.php");
		exit;
	} else {
	    echo "Error updating record: " . $con->error;
	}
	mysqli_close($con);
?>