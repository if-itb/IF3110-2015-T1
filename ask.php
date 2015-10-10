<?php
	include "connect.php"; 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST["name"];
          $email = $_POST["email"];
          $topic = $_POST["topic"];
          $content = $_POST["content"];}
	date_default_timezone_set('Asia/Jakarta');
	$datetime = date('Y/m/d h:i:s a', time());
	$sql = "INSERT INTO question (Q_name, Q_email, Q_topic, Q_content, Q_Datetime) 
	VALUES ('$name', '$email', '$topic', '$content', '$datetime')";
	if (mysqli_query($conn, $sql)) {
	    header('Location: index.php');    
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?> 
