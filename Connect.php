<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = "stackexchange";

// Create connection
global $conn;
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$selected = mysqli_select_db($conn, $name);

?>
