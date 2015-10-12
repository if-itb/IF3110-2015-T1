<?php
	include("../Connect.php");

	global $conn;
	$query = "UPDATE question SET q_name = '".$_POST["name"]."' , q_email = '".$_POST["email"]."' , q_topic = '".$_POST["topic"]."' , q_content = '".$_POST["content"]."' WHERE q_id = '".$_POST["id"]."'";
	
	
	$rquery = mysqli_query($conn, $query);
	echo "Your post has been edited successfully";
	
?>