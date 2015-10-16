<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "stackexchange";
	$name = $_POST["Name"];
	$email = $_POST["Email"];
	$content = $_POST["Content"];
	$question_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('stackexchange') or die(mysql_error());
	//echo "$question_id";
	$sql = "INSERT INTO answer (`question_ID`, `Nama`, `Email`, `Content`) VALUES('$question_id', '$name', '$email','$content')";
	mysql_query($sql);
	mysql_close();
	header("Location: /WBD/answer.php?id=$question_id");
?>