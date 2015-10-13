<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stackoverflow";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
	die("connection failed : " . $conn->connect_error);
}
$sql1 = "DELETE FROM questions WHERE no=".$_GET['id'];
$sql2 = "DELETE FROM answers WHERE question_no=".$_GET['id'];
if($conn->query($sql1) == TRUE and $conn->query($sql2) == TRUE) 
	header('Location: ../home/homepage.php');
else 
	echo "error : ". $sql . "<br>". $conn->error;
$conn -> close();
?>