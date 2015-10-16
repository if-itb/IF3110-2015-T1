<?php 
	require('includes/config.php'); 
	include('includes/header.php');
	//include('js/javasript.js');
	$qid = $_GET['id'];
	/*
	$name = $_GET['name'];
	$email = $_GET['mail'];
	$content = $_GET['content'];*/


	$name = trim($_POST["fname"]);
	$email = trim($_POST["femail"]);
	$topic = trim($_POST["fquestiontopic"]);
	$content = trim($_POST["fcontent"]);
	if ($qid == -1){
		$sql = "insert into question values('','".$name."', '".$email."', '".$topic."', '".$content."', 0)";
	} else {
		$sql = "update question set name = '".$name."', email = '".$email."', topic = '".$topic."', content = '".$content."' where id = '".$qid."'";
	}
	mysql_query($sql);
	mysql_close($link);
	header("Location: question_list.php");
?>