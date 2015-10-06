<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include("popUpA.php");
		include("popUpError.php");

		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
		$date = date('Y-m-d H:i:s');
		$id = $_GET['id'];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 


		$value = "('" . $name . "','" . $email . "','" . $content . "','". $date ."'," . 0 . "," . $id .")";
		$sql = "INSERT INTO Answers (name,email,content,date,vote,qID) VALUES ".$value;

		if ($conn->query($sql) === TRUE) {
			$sql = "UPDATE Questions SET answer=answer+1 WHERE id=".$id;
		    if ($conn->query($sql) === TRUE) {
			    echo $popUpA;
			} else {
			    echo $popUpError;
			}
		} else {
		    echo $popUpError;
		}
		$conn->close();
	}
?>

