<?php

include("database/conn.php");

$qid = $_GET['id'];

$q_query = "DELETE FROM questions WHERE q_id=" .$qid. ";";
$a_query = "DELETE FROM answers WHERE a_qid=" .$qid. ";";

if (mysqli_query($dbcon, $q_query) && mysqli_query($dbcon, $a_query))
	echo "<script> window.open('index.php', '_self') </script>";


?>