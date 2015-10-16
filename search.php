<?php 
	$query = $_POST['topicsearch'];
	$sql = "SELECT * FROM question WHERE konten LIKE %".$query."% OR topik LIKE %".$query ."%"; 
	$result = mysqli_query($conn, $sql);
?>