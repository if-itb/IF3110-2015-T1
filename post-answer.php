<?php require('config.php');
	$post_id = trim($_GET['id']);
	$name = trim($_POST["Nama"]);
	$email = trim($_POST["Email"]);
	$content = trim($_POST["Jawaban"]);
	$query = "insert into answer values('','".$post_id."','".$name."', '".$email."', '".$content."', 0)";
	mysql_query($query);
	mysql_close($link);
	header("Location: view-question.php?id=$post_id");
	mysql_close($link);
?>