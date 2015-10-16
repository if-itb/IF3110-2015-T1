<?php 
	include('connect-mysql.php');
	$result = mysqli_query($con,"SELECT * FROM questions ORDER BY id DESC");
	if(! $result ) {
		die('Could not delete data: ' . mysql_error());
	}
	mysqli_close($con);
?>