<?php
function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
if(isset($_POST['Post'])){
	

	include('DB_connection.php');
	
	$name		= $_POST['Name'];	
	$email		= $_POST['Email'];	
	$topic		= $_POST['QuestionTopic'];	
	$content	= $_POST['message'];	
	$date		= date('Y-m-d H:i:s');
	$input = mysql_query("INSERT INTO question (Content, Vote, author, Email, Topic, Date) VALUES('$content' , '0','$name', '$email', '$topic', '$date')") or die(mysql_error());
	
	
}else{	
	echo '<script>window.history.back()</script>';
}
Redirect('index.php', false);
?>