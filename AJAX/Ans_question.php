<?php
	include("../Connect.php");

	global $conn;
	$query = "INSERT INTO answer (a_name, a_email, a_content, q_id) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["content"]."', '".$_POST["qid"]."')";
	
	$rquery = mysqli_query($conn, $query);
	echo "Your answer has been posted successfully";
	
?>