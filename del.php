<?php
mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
mysql_select_db("db_stackexchange") or die ("Failed to load database.");
$id = $_GET['q_id'];
$query = "delete from questions where question_id=$id";
$hasil = mysql_query($query);  
header("Location: index.php");
die();
?>