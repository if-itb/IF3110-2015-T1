<?php

include("database/conn.php");

$id = $_GET['id'];
$table = $_GET['table'];
$value = $_GET['value'];

if ($table == "questions") {
	$query = "UPDATE questions SET q_vote=q_vote+".$value." WHERE q_id=".$id.";";
} else if ($table == "answers") {
	$query = "UPDATE answers SET a_vote=a_vote+".$value." WHERE a_id=".$id.";";
}

if (mysqli_query($dbcon, $query)) {
	 echo "Vote success";
} else {
    echo "Error voting: " . mysqli_error($conn);
}

?>