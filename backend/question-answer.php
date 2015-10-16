<?php 
	include('connect-mysql.php');
	$id = $_GET["id"];
	$result = mysqli_query($con,"SELECT * FROM questions WHERE id=$id");
	if(! $result ) {
		die('Could not delete data: ' . mysql_error());
	}
	$question = mysqli_fetch_array($result);

	$result_answer = mysqli_query($con,"SELECT * FROM answers WHERE question_id=$id");
	if(! $result_answer ) {
		die('Could not delete data: ' . mysql_error());
	}

	mysqli_close($con);
?>