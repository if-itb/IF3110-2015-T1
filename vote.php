<?php

include("database/conn.php");

$id = $_GET['id'];
$value = $_GET['value'];

$query = "UPDATE questions SET q_vote=q_vote+".$value." WHERE q_id=".$id.";";

if (mysqli_query($dbcon, $query)) {
	 echo "Vote success";
} else {
    echo "Error voting: " . mysqli_error($conn);
}

?>