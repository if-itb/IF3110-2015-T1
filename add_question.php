<?php

include("database/conn.php");

if (isset($_POST['post'])) {
	// using post because the informations are critical
	$post_query = "INSERT INTO questions (q_name, q_email, q_topic, q_content) VALUES";

	$name = mysqli_real_escape_string($dbcon, $_POST['name']);
	$email = mysqli_real_escape_string($dbcon, $_POST['email']);
	$topic = mysqli_real_escape_string($dbcon, $_POST['topic']);
	$content = $_POST['content'];

	// insert the information into database
	$post_query .= "('".$name."', '".$email."', '".$topic."', '".$content."')";
	if (mysqli_query($dbcon, $post_query)) {
		echo "<script> window.open('index.php', '_self') </script>";
	}
}

?>