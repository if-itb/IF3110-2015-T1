<?php

$name = $_POST['Name'];	
$email = $_POST['Email'];
$judul = $_POST['Judul'];
$konten = $_POST['Konten'];

$servername = "localhost";
$username = "herifauzan";
$password = "HFR_78itb";

$con = mysql_connect($servername,$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mydb", $con);

mysql_query("INSERT INTO question (nama, email, topik, konten,  vote)
VALUES ('$name', '$email', '$judul' ,'$konten', 0)");

mysql_close($con);
?>