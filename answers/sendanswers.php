<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stackoverflow";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
	die("connection failed : " . $conn->connect_error);
}
$sql = "INSERT INTO answers(email, name, content, question_no)
VALUES ('".$_POST['email']."','".$_POST['name']."','".$_POST['content']."',11)";
if($conn->query($sql) == TRUE) {
	echo "<form name=\"makequestion\" method=\"post\" action=\"answers.php\">";
	echo "<input type=\"submit\" value=\"back\" id=\"button\">";
}
else {
	echo "error : ". $sql . "<br>". $conn->error;
}

$conn -> close();
?>