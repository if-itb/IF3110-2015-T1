<?php
	include("../Connect.php");

	global $conn;
	$query = "INSERT INTO question (q_name, q_email, q_topic, q_content) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["topic"]."', '".$_POST["content"]."')";
	
	$rquery = mysqli_query($conn, $query);
	echo "Your post has been posted successfully";
	
?>