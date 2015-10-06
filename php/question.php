<?php

$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);

$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$qtopic = mysqli_real_escape_string($link,$_POST['qtopic']);
$qcontent = mysqli_real_escape_string($link,$_POST['qcontent']);

/* Cek Koneksi Database */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "INSERT INTO questions (q_id,name,email,qtopic,qcontent,date,answer,vote) VALUES(NULL,'$name','$email','$qtopic','$qcontent',NOW(),0,0)";
mysqli_query($link,$query);

header("Location: ../list.html");
exit();