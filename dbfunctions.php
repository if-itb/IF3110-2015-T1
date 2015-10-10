<?php
	
	function ConnectToDatabase() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}


		return $conn;
	}

	function GetAllQuestions() {

		$conn = ConnectToDatabase();
		$sql = "SELECT * FROM Question";
		$result = mysqli_query($conn, $sql);

		return $result;	
	}

	function GetAllAnswers($id) {
		$conn = ConnectToDatabase();
		$sql = "SELECT * FROM Question INNER JOIN Answer ON Question.question_id=$id AND Question.question_id=Answer.question_id";
		$result = mysqli_query($conn, $sql);	

		return $result;

	}

	function GetQuestion($id) {
		$conn = ConnectToDatabase();
		$sql = "SELECT * FROM Question WHERE Question.question_id=$id";
		$result = mysqli_query($conn, $sql);	

		$row = mysqli_fetch_assoc($result);

		return $row;
	}




?>