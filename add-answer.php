<?php

include("connection.php");

if (isset($_POST['post'])) {
	$post_query = "INSERT INTO answer (ans_name, ans_email, ans_q_id, ans_content) VALUES";

	$qid = $_POST['qid'];
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$content = mysqli_real_escape_string($conn, $_POST['content']);

	$post_query .= "('".$name."', '".$email."', '".$qid."', '".$content."')";
	
	if (mysqli_query($conn, $post_query)) {
		echo "<script> window.open('question-details.php?id=".$qid."', '_self') </script>";
	}
}

?>