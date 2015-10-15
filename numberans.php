<?php
	if(isset($_GET['id'])) {
		$id = $_GET['id']; 
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "SELECT COUNT(*) FROM answer WHERE id_question={$conn->real_escape_string($id)}";
		$result = $conn->query($sql);
		
		echo $result;
		
		$conn->close();
	}
	else {
		http_response_code(400);
		echo 'Bad request';
	}
?>