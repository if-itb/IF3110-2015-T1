<?php
header('Location: /');
include 'header.php';
include 'database.php';

$conn = db_init();
$qid = $_GET['id'];
$query = "DELETE FROM question WHERE Id = $qid";
mysqli_query($conn, $query);
$query = "DELETE FROM answer WHERE qid = $qid";
mysqli_query($conn, $query);
mysqli_close($conn);