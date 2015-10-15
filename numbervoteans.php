<?php
	if(isset($_GET['numvote']) && isset($_GET['id']) && isset($_GET['id_ans'])) {
		
		$newVote = intval($_GET['numvote']);
		$id = $_GET['id']; 
		$id_ans = $_GET['id_ans'];

		echo $newVote;
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "UPDATE answer SET num_votes={$conn->real_escape_string($newVote)} WHERE id_question={$conn->real_escape_string($id)} AND num_answer={$conn->real_escape_string($id_ans)}";
		$conn->query($sql);
		
		$conn->close();
	}
	else {
		http_response_code(400);
		echo 'Bad request';
	}
?>