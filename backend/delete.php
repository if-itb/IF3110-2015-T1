<?php
	include('db_connector.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM question WHERE id ='$id'";
	if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header('Location: ../index.php');
?>