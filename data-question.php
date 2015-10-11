<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	$sql = "INSERT INTO question (`name`, `email`, `topic`, `content`) VALUES('$name', '$email', '$topic', '$content')";
	mysql_query($sql);
	mysql_close();
	header("Location: /Tubes1/index.php");
?>