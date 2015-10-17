<?php 
	include('db_connector.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM answer WHERE id ='$id'";
	$result_answer = mysqli_query($con,$sql);
	mysqli_close($con);
?>