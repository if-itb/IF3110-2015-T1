<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stackoverflow";
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error) {
	die("Connection failed : " . $conn->connect_error);
}
$sql = "INSERT INTO questions(email, name, question, content) 
VALUES ('".$_POST['email']."','".$_POST['name']."','".$_POST['question']."','".$_POST['content']."')";
if($conn->query($sql) == TRUE) {
	echo "new record created successfully";
}
else {
	echo "error : " . $sql . "<br>" . $conn->error;
}	

$conn->close();

?>