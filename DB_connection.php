<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stackexchange";

// Create connection
$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
mysql_select_db($dbname, $conn) or die("Tidak ada database yang dipilih");
//$conn->close();
?>