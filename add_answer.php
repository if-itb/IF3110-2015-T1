<?php

include("database/conn.php");

if (isset($_POST['post'])) {
	// using post because the informations are critical
	// inserting the answer
	$post_query = "INSERT INTO answers (a_name, a_email, a_qid, a_content) VALUES";

	// avoiding SQL injection
	$qid = mysqli_real_escape_string($dbcon, $_POST['qid']);
	$name = mysqli_real_escape_string($dbcon, $_POST['name']);
	$email = mysqli_real_escape_string($dbcon, $_POST['email']);
	$content = mysqli_real_escape_string($dbcon, $_POST['content']);

	// insert the information into database
	$post_query .= "('".$name."', '".$email."', '".$qid."', '".$content."')";
	
	if (mysqli_query($dbcon, $post_query)) {
		echo "<script> window.open('thread.php?id=".$qid."', '_self') </script>";
	}
}

?>