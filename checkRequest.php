<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include("popUp.php");
		include("popUpError.php");

		$name = $_POST['name'];
		$email = $_POST['email'];
		$topic = $_POST['topic'];
		$content = $_POST['content'];
		$date = date('Y-m-d H:i:s');

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 


		$value = "('" . $name . "','" . $email . "','" . $topic . "','" . $content . "','". $date ."'," . 0 . "," . 0 .")";
		$sql = "INSERT INTO Questions (name,email,topic,content,date,vote,answer) VALUES ".$value;

		if ($conn->query($sql) === TRUE) {
		    echo $popUp;
		} else {
		    echo $popUpError;
		}
		$conn->close();
	}else if(!empty($_GET["delete"])){
		include("popUpDelete.php");
		include("popUpError.php");

		$id = $_GET["id"];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "DELETE FROM Questions WHERE id=".$id;

		if ($conn->query($sql) === TRUE) {
		    echo $popUpDelete;
		} else {
		    echo $popUpError;
		}

		$conn->close();
	}
?>