<?php require('../includes/config.php');
	$name = trim($_POST["Nama"]);
	$email = trim($_POST["Email"]);
	$topic = trim($_POST["Topik"]);
	$content = trim($_POST["Konten"]);
	$q_id = $_GET['id'];
	if ( ! isset($q_id) ) {
		$query = "insert into question values('','".$name."', '".$email."', '".$topic."', '".$content."', 0)";
	} else {
		$query = "update question set name = '".$name."', email = '".$email."', topic = '".$topic."', content = '".$content."' where id = '".$q_id."'";
	}
	mysql_query($query);
	mysql_close($link);
	header('Location: ../index.php');
	header('Location: ../view-question.php?id='.$q_id.'')
?>