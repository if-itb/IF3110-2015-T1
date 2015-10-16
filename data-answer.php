<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$content_answer = $_POST["content"];
	$content = mysql_real_escape_string($content_answer);
	$question_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "INSERT INTO answer (`question_id`, `name`, `email`, `content`) VALUES('$question_id', '$name', '$email','$content')";
	mysql_query($sql);
	mysql_close();
	header("Location: /tugasWBD/answer.php?id=$question_id");
?>