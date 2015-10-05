<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include("popUp.php");
		include("popUpError.php");

		$name = $_POST['name'];
		$email = $_POST['email'];
		$topic = $_POST['topic'];
		$content = $_POST['content'];
		$date = date('Y-m-d H:i:s');

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "StakeExchange";

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
	}
?>