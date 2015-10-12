<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id'])) {
			if (!$conn ->query ("UPDATE answer SET vote = vote - 1 WHERE id = $_GET[id]")){
				die('Error Query['.$conn -> error.']');
		}
				
		}
		}
		$result = $conn->query ("SELECT * FROM answer WHERE id = $_GET[id]");
		//QUESTION
			while($row = $result -> fetch_assoc()){
				echo $row['vote'];
	}

?>

