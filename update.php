<?php
	include "connect.php"; 
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$name = $_POST["name"];
    $email = $_POST["email"];
    $topic = $_POST["topic"];
    $content = $_POST["content"];
   	date_default_timezone_set('Asia/Jakarta');
	$datetime = date('Y/m/d h:i:s a', time());
	$sql = "UPDATE question SET Q_Name='$name', Q_email='$email',Q_topic='$topic',Q_content='$content',Q_Datetime='$datetime' WHERE Q_ID='$id'";
	if (mysqli_query($conn, $sql)) {
	    header('Location: index.php');    
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?> 