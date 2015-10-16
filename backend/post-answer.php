<?php
	include('connect-mysql.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	if($id != null){
		$query = "INSERT INTO answers (question_id, name, email, content) VALUES ('$id', '$name', '$email', '$content')";
		if (!mysqli_query($con, $query)) {
		  die('Error: ' . mysqli_error($con));
		}
	}
	mysqli_close($con);
	header('Location: ajax-answer.php?id='.$id);
?>