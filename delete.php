<?php
	require 'function/connect.php';

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
			