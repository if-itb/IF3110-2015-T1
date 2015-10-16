<?php

$search = $_POST['topicsearch'];	

print_r($_POST);

$servername = "localhost";
$username = "herifauzan";
$password = "HFR_78itb";

$con = mysql_connect($servername,$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mydb", $con);

mysql_query("SELECT * FROM question WHERE konten LIKE %'$search'%");

mysql_close($con);
?>