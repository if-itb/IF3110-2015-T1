<?php

include("database/conn.php");

if ($_GET['target'] == 'new') {
	if (isset($_POST['post'])) {
		// using post because the informations are critical
		$post_query = "INSERT INTO questions (q_name, q_email, q_topic, q_content) VALUES";

		$name = mysqli_real_escape_string($dbcon, $_POST['name']);
		$email = mysqli_real_escape_string($dbcon, $_POST['email']);
		$topic = mysqli_real_escape_string($dbcon, $_POST['topic']);
		$content = mysqli_real_escape_string($dbcon, $_POST['content']);

		// insert the information into database
		$post_query .= "('".$name."', '".$email."', '".$topic."', '".$content."')";
		if (mysqli_query($dbcon, $post_query))
			echo "<script> window.open('index.php', '_self') </script>";
	}

} else if ($_GET['target'] == 'update') {
	if (isset($_POST['post'])) {
		// using post because the informations are critical

		$id = $_POST['id'];
		$name = mysqli_real_escape_string($dbcon, $_POST['name']);
		$email = mysqli_real_escape_string($dbcon, $_POST['email']);
		$topic = mysqli_real_escape_string($dbcon, $_POST['topic']);
		$content = mysqli_real_escape_string($dbcon, $_POST['content']);

		// insert the information into database
		$post_query = "UPDATE questions SET q_name='".$name."', q_email='".$email."', q_topic='".$topic."', q_content='".$content."' WHERE q_id=".$id.";";
		
		if (mysqli_query($dbcon, $post_query))
			echo "<script> window.open('index.php', '_self') </script>";
	}	
}

?>