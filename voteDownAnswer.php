<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id = $_POST["id"];

	$id = mysql_real_escape_string($id);
	$sql = "UPDATE answer SET num_vote= num_vote-1 WHERE id_answer='$id'";

	if ($con->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $con->error;
	}

	$con->close();
?>