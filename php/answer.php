<?php

$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);

/* Cek Koneksi Database */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$acontent = mysqli_real_escape_string($link,$_POST['acontent']);
$qID = $_POST['qID'];



$query = "INSERT INTO answers (a_id,q_id,name,email,acontent,vote,date) VALUES(NULL,'$qID','$name','$email','$acontent',0,NULL)";
mysqli_query($link,$query);

$query = "UPDATE questions SET answer=answer+1 WHERE q_id = '$qID'";
mysqli_query($link,$query);

mysqli_close($link);
header("Location: ../list.html");
exit();