<?php require('config.php');

	$name = trim($_POST["Nama"]);
	$email = trim($_POST["Email"]);
	$topic = trim($_POST["Topik"]);
	$content = trim($_POST["Konten"]);
	$query = "insert into question values('','".$name."', '".$email."', '".$topic."', '".$content."', 0)";
	mysql_query($query);
	mysql_close($link);
	header('Location: index.php');

?>