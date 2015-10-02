<?php 
	include('db_connector.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM question WHERE id ='$id'";
	$result = mysqli_query($con,$sql);
	$question = mysqli_fetch_array($result);
	mysqli_close($con);
?>