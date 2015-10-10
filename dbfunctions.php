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

	function GetAllQuestion() {

		$conn = ConnectToDatabase();
		$sql = "SELECT * FROM Question";
		$result = mysqli_query($conn, $sql);

		return $result;	
	}




?>