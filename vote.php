<?php
include 'database.php';

$conn = db_init();

$id = $_POST['id'];
$val = $_POST['val'];
$dbname = $_POST['dbname'];

$query = "UPDATE $dbname SET vote = $val WHERE Id = $id";
$res = mysqli_query($conn, $query);

mysqli_close($conn);