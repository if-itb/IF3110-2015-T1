<?php
	include('db_connector.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	$sql = "INSERT INTO answer (id, name, email, content) VALUES ('$id', '$name', '$email', '$content')";
	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>