<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";

	include("popUp.php");
	include("popUpDelete.php");
	include("popUpError.php");

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$topic = $_POST['topic'];
		$content = $_POST['content'];
		$date = date('Y-m-d H:i:s');

		$value = "('" . $name . "','" . $email . "','" . $topic . "','" . $content . "','". $date ."'," . 0 . "," . 0 .")";
		$sql = "INSERT INTO Questions (name,email,topic,content,date,vote,answer) VALUES ".$value;

		if ($conn->query($sql) === TRUE) {
		    echo $popUp;
		} else {
		    echo $popUpError;
		}
	}else if(!empty($_GET["delete"])){

		$id = $_GET["id"];

		$sql="DELETE FROM Answers WHERE qID=".$id;

		if ($conn->query($sql) === TRUE) {
			
		    $sql = "DELETE FROM Questions WHERE id=".$id;

			if ($conn->query($sql) === TRUE) {
			    echo $popUpDelete;
			} else {
			    echo $popUpError;
			}
		} else {
		    echo $popUpError;
		}

	}

	$conn->close();
?>