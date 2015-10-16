<?php

$name = $_POST['Name'];	
$email = $_POST['Email'];
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

mysql_query("INSERT INTO answer (nama, email, konten,  vote, idquest) VALUES ('$name', '$email', '$konten', 0, $p )");
?>