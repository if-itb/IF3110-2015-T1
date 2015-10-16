<?php 
	include('connect-mysql.php');
	$query = "SELECT * FROM questions ORDER BY id DESC";
	$result = mysqli_query($con, $query);
	if(! $result ) {
		die('Could not delete data: ' . mysql_error());
	}
	mysqli_close($con);
?>