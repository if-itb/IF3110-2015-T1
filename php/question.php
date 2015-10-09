<?php

require_once("connectDatabase.php");

#Database yang di post
$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$qtopic = mysqli_real_escape_string($link,$_POST['qtopic']);
$qcontent = mysqli_real_escape_string($link,$_POST['qcontent']);

#Execute Query
$query = "INSERT INTO questions (q_id,name,email,qtopic,qcontent,answer,vote,date) VALUES(NULL,'$name','$email','$qtopic','$qcontent',0,0,NULL)";
mysqli_query($link,$query);

#Close Connection
mysqli_close($link);

#Redirect ke List Question
header("Location: ../index.html");
exit();