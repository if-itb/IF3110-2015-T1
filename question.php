<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbmy";
	
// create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
// check connection
if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "INSERT INTO question (name,email,topik,konten) VALUES ('". $_POST['nama'] ."','". $_POST['email'] ."','". $_POST['topikpertanyaan'] ."','". $_POST['pertanyaan'] ."')";

if(mysqli_query($conn,$sql)){
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("location: " . $_SERVER["HTTP_REFERER"]);
?>