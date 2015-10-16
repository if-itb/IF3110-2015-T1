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
	$content = trim($_POST["fcontent"]);
	$query = "SELECT * FROM question WHERE id = '".$qid."'";
	$data = mysql_query($query);
	$sql = "INSERT INTO answer VALUES ('','".$qid."','".$name."', '".$email."', '".$content."', 0)";
	mysql_query($sql);
	mysql_close($link);
	header("Location: question_list.php");
?>