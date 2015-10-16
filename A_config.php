<?php
$host = 'localhost'; 
$user = 'root';
$pass = '';
$dbname = 'simpleblog';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($dbname);
?>