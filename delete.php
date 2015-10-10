<?php
	$servername = "localhost";
	$username = "root";
	$password = "12345";
	$db = "stackexchange";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	if (isset($_GET['id'])){
		$id = (int)$_GET['id'];

		// sql to delete a record
		$sql = "DELETE FROM question WHERE id=$id";

		if ($conn->query($sql) === TRUE) {
		    //do nothing;
		} else {
		    echo "Error deleting record: " . $conn->error;
		}
	}

	$conn->close();

	header("Location: home.php");
?>
			