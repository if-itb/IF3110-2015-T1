<?php
	include('db_connector.php');

	$name = $_POST['name'];
	$email = $_POST['email'];
	$topic = $_POST['topic'];
	$content = $_POST['content'];
	$sql = $sql="INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header('Location: ../index.php');
?>