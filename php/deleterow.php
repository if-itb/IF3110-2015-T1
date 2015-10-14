<?php
	require 'functions.php';

	$table = $_GET['table'];
	$row = $_GET['row'];

	$conn = get_connectqa();
	$result = mysqli_query($conn,"DELETE FROM $table WHERE id = $row");
	echo "Deleted successfully!";
	mysqli_close($conn);
	header('Location: Home.php');
?>