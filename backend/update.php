<?php 
	include('db_connector.php');
	$id = $_POST['id'];
	$topic = $_POST['topic'];
	$content = $_POST['content'];
	$sql = "UPDATE question SET topic = '$topic', content = '$content' WHERE id = '$id'";
	if(!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header('Location: ../question.php?id='.$id);
?>