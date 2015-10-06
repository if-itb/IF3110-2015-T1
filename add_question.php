<?php

if(isset($_POST['Post'])){
	

	include('DB_connection.php');
	
	$name		= $_POST['Name'];	
	$email		= $_POST['Email'];	
	$topic		= $_POST['QuestionTopic'];	
	$content	= $_POST['message'];	
	$date		= date('Y-m-d H:i:s');
	$input = mysql_query("INSERT INTO question VALUES('1','$content' , '1','$name', '$email', '$topic', '$date')") or die(mysql_error());
	
	
}else{	
	echo '<script>window.history.back()</script>';
}
?>