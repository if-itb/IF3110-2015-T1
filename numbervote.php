<?php
	if(isset($_GET['numvote']) && isset($_GET['id'])) {
		
		$newVote = intval($_GET['numvote']);
		$id = $_GET['id']; 

		echo $newVote;
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "UPDATE question SET num_vote={$conn->real_escape_string($newVote)} WHERE id_question={$conn->real_escape_string($id)}";
		$conn->query($sql);
		
		$conn->close();
	}
	else {
		http_response_code(400);
		echo 'Bad request';
	}
?>