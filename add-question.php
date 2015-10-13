<?php
	
	require_once ("connection.php");

	if(isset($_POST['post'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$topic = $_POST['topic'];
		$content = $_POST['content'];

		if($_GET['target']=='new') {
			$post_query = "INSERT INTO question(q_name, q_email, q_topic, q_content) VALUES";
			$post_query .= "('".$name."', '".$email."', '".$topic."', '".$content."')";
		} else if ($_GET['target']=='update') {
			$id = $_POST['id'];
			$post_query = "UPDATE question SET q_name='".$name."', q_email='".$email."', q_topic='".$topic."', q_content='".$content."' WHERE q_id=".$id.";";
		
		}

		if (mysqli_query($conn, $post_query)) {
			echo "<script> window.open('index.php', '_self') </script>";
		}
		else {
			die('Invalid query: '.mysql_error());
		}
	}
?>