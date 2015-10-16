<?php

include("database/conn.php");

$qid = mysqli_real_escape_string($dbcon, $_GET['id']);

// delete the main post
$q_query = "DELETE FROM questions WHERE q_id=" .$qid. ";";
// delete all the answers related to the post
$a_query = "DELETE FROM answers WHERE a_qid=" .$qid. ";";

if (mysqli_query($dbcon, $q_query) && mysqli_query($dbcon, $a_query))
	echo "<script> window.open('index.php', '_self') </script>";


?>