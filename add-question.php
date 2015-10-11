<?php
	
	require_once ("connection.php");

	if(isset($_POST['post'])){
		$post_query = "INSERT INTO question(q_name, q_email, q_topic, q_content) VALUES";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$topic = $_POST['topic'];
		$content = $_POST['content'];
		$post_query .= "('".$name."', '".$email."', '".$topic."', '".$content."')";
		if (mysqli_query($conn, $post_query)) {
			echo "<script> window.open('index.php', '_self') </script>";
		}
		else {
			die('Invalid query: '.mysqli_error());
		}
	}
?>