<?php

$server = "localhost";
$sql_user = "root";
$sql_pass = "";
$dbname = "stackexchange";

$dbcon = mysqli_connect($server, $sql_user, $sql_pass, $dbname);

if (!$dbcon)
	die("Failed to connect to database: " . mysqli_connect_error());

?>