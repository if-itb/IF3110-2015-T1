<?php

include("database/conn.php");

$id = $_GET['id'];
$table = $_GET['table'];
$value = $_GET['value'];

if ($table == "questions") {
	$query = "UPDATE questions SET q_vote=q_vote+".$value." WHERE q_id=".$id.";";
	$votes = "SELECT q_vote FROM questions WHERE q_id=".$id.";";
} else if ($table == "answers") {
	$query = "UPDATE answers SET a_vote=a_vote+".$value." WHERE a_id=".$id.";";
	$votes = "SELECT a_vote FROM answers WHERE a_id=".$id.";";
}

if (mysqli_query($dbcon, $query)) {
	$row = mysqli_fetch_array(mysqli_query($dbcon, $votes), MYSQLI_NUM);
	echo $row[0];
} else {
    echo "Error vote: " . mysqli_error($dbcon);
}

?>