<?php
	if(isset($_GET['id'])) {
		$id = $_GET['id']; 
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = 'DELETE FROM question WHERE id_question =  '.intval($_GET['id']);
		$conn->query($sql);
		
		$sql = 'DELETE FROM answer WHERE id_question =  '.intval($_GET['id']);
		$conn->query($sql);

		$conn->close();
		echo "halo halo";
	}
	else {
		http_response_code(400);
		echo 'Bad request';
	}
?>