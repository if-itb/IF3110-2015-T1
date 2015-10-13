<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stackoverflow";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
	die("connection failed : " . $conn->connect_error);
}
$sql = "DELETE FROM questions WHERE no=".$_GET['id'];
if($conn->query($sql) == TRUE) 
	header('Location: ../home/homepage.php');
else 
	echo "error : ". $sql . "<br>". $conn->error;
$conn -> close();
?>